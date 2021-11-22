<?php


namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\RoleCreateRequest;


class RoleController extends Controller
{
    protected $rolerepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->rolerepository=$roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if($this->authorize('viewAny', User::class)){
            $roles=$this->rolerepository->findAll();
            return response()->json([
                "roles"=>$roles,
                "message"=>"Role list"

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
    public function store(RoleCreateRequest $request)
    {
        //
        if($this->authorize('create', User::class)){
            $role=$this->rolerepository->create($request->all());
            return response()->json([
                "role"=>$role,
                "message"=>"Role added successfully"
            ],Response::HTTP_CREATED);
        }
        return response()->json([
            "error"=>"Not Authorized"

        ],Response::HTTP_FORBIDDEN);

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
        if($this->authorize('view', User::class)){
            $role=$this->rolerepository->findById($id);
            return response()->json([
                "role"=>$role,
                "message"=>"Role found"
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
        if($this->authorize('update', User::class)){
            $this->rolerepository->update($request->all(),$id);
            return response()->json([

                "message"=>"Role updated"
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
        if($this->authorize('delete', User::class)){
            $this->rolerepository->delete($id);
            return response()->json([
                "message"=>"Role deleted"
            ],Response::HTTP_OK);
        }
        return response()->json([
            'message'=>'Not Authorized'
        ],Response::HTTP_FORBIDDEN);

    }
}
