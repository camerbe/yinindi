<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;


class UserRepository extends BaseRepository{

    public function __construct(User $user)
    {
        $this->model=$user;
    }
    public function findById($id){
        $user= parent::findById($id);
        return new UserResource($user);
    }
    public function delete($id){
        $user=$this->findById($id);
        $user->roles()->detach();
        return parent::delete($id);
    }

    public function update(Array $input, $id)
    {
        $input['nom']=Str::title($input['nom']);
        $input['prenom']=Str::title($input['prenom']);
        parent::update($input,$id) ;

        $user=$this->findById($id);
        $role=Role::find($input['role']);
        $role_ids=[$role->id];
        $user->roles()->sync($role_ids);
        return  new UserResource($user);
    }

    public function create(Array $input)
    {

        $input['nom']=Str::title($input['nom']);
        $input['prenom']=Str::title($input['prenom']);
        $input['password']=bcrypt($input['password']);
        $userId= parent::create($input)->id;
        $user=$this->findById($userId);
        $user->roles()->attach($input['role']);
        return new UserResource($user);
    }
    public function findAll(){
        $users= User::orderBy('nom','asc')->orderBy('prenom','asc')->paginate();
        return UserResource::collection($users);

     }
}