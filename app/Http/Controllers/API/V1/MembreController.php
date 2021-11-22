<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use App\Models\Membre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\MembreRepository;
use App\Http\Requests\MembreCreateRequest;
use Symfony\Component\HttpFoundation\Response;

class MembreController extends Controller
{
    protected $membrerepository;

    function __construct(MembreRepository $membrerepository)
    {
        $this->membrerepository=$membrerepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $membres=$this->membrerepository->findAll();

            return response()->json([
                "membre"=>$membres,
                "message"=>"Membre List"
            ],Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembreCreateRequest $request)
    {
        //

        if(!$this->authorize('create', Membre::class)){
            return response()->json([
                'message'=>'Not Authorized'
            ],Response::HTTP_FORBIDDEN);
        }

        $membre=$this->membrerepository->create($request->all());

        return response()->json([
            'membre'=>$membre,
            'message'=>'Membre created successfully'
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
        $membre=$this->membrerepository->findById($id);
        return response()->json([
            'membre'=>$membre,
            'message'=>'Membre found'
        ],Response::HTTP_FOUND);
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
        if($this->authorize('update', Membre::find($id))){
            $membre=$this->membrerepository->update($request->all(),$id);
            return response()->json([
                'membre'=>$membre,
                'message'=>'Membre updated'
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
        if($this->authorize('delete', Membre::find($id))){
            $this->membrerepository->delete($id);
            return response()->json([
                "message"=>"Membre deleted"
            ],Response::HTTP_OK);
        }

        return response()->json([
            'message'=>'Not Authorized'
        ],Response::HTTP_FORBIDDEN);
    }
}
