<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository{

    public function __construct(Role $role){
        $this->model=$role;
    }

    public function findOne($id){
        return parent::findById($id);
    }

    public function delete($id){
        return parent::delete($id);
    }

    public function update(Array $input, $id)
    {
        $input['role']=Str::upper($input['role']);
        return parent::update($input,$id);
    }

    public function create(Array $input){
        $input['role']=Str::upper($input['role']);
        return parent::create($input);
    }
    public function findAll(){
        return Role::orderBy('role','asc')->paginate();
    }




}