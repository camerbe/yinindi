<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userrepository)
    {
        $this->userRepository=$userrepository;
        //$this->authorizeResource(User::class,'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->authorize('viewAny', User::class)){
            $users=$this->userRepository->findAll();

            return response()->json([
                "users"=>$users,
                "message"=>"User List"
            ],Response::HTTP_OK);
        }
        return response()->json([
            "error"=>"Not Authorized"

        ],Response::HTTP_FORBIDDEN);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        //
        if(!$this->authorize('create', User::class)){
            return response()->json([
                'message'=>'Not Authorized'
            ],Response::HTTP_FORBIDDEN);
        }
        $user=$this->userRepository->create($request->all());

        return response()->json([
            'user'=>$user,
            'message'=>'User created successfully'
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if($this->authorize('view', User::find($id))){
            $user=$this->userRepository->findById($id);
            return response()->json([
                'user'=>$user,
                'message'=>'User found'
            ],Response::HTTP_FOUND);
        }

        return response()->json([
            'message'=>'Not Authorized'
        ],Response::HTTP_FORBIDDEN);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($this->authorize('update', User::find($id))){
            $user=$this->userRepository->update($request->all(),$id);
            return response()->json([
                'user'=>$user,
                'message'=>'User updated'
            ],Response::HTTP_ACCEPTED);
        }

        return response()->json([
            'message'=>'Not Authorized'
        ],Response::HTTP_FORBIDDEN);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($this->authorize('delete', User::find($id))){
            $this->userRepository->delete($id);
            return response()->json([
                "message"=>"User deleted"
            ],Response::HTTP_OK);
        }

        return response()->json([
            'message'=>'Not Authorized'
        ],Response::HTTP_FORBIDDEN);

    }
}
