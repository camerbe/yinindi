<?php

namespace App\Repositories;
use App\Models\Membre;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;
use App\Http\Resources\MembreResource;

class MembreRepository extends BaseRepository{

    public function __construct(Membre $membre)
    {
        $this->model=$membre;

    }
    public function findById($id){
        $membre= parent::findById($id);
        return new MembreResource($membre);
    }
    public function delete($id){
        //$membre=$this->findById($id);
        //$user->roles()->detach();
        return parent::delete($id);
    }
    public function update(Array $input, $id)
    {

        $input['nom']=Str::upper($input['nom']);
        $input['prenom']=Str::title($input['prenom']);
        $input['username']=Str::slug($input['nom'].$input['prenom']);

        parent::update($input,$id);

        $membre=$this->findById($id);

        return  new MembreResource($membre);
    }
    public function create(Array $input)
    {

        $input['nom']=Str::upper($input['nom']);
        $input['prenom']=Str::title($input['prenom']);
        $input['username']=Str::slug($input['nom'].$input['prenom']);
        return parent::create($input);

    }

    public function findAll(){

        $membres= Membre::orderBy('nom','asc')->orderBy('prenom','asc')
        ->leftJoin('pays','pays.code','=','membres.fkpays')
        ->select('*')->paginate();
        return MembreResource::collection($membres);
    }

}