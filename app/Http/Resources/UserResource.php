<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\This;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'fullname'=>$this->nom.' '.$this->prenom,
            'email'=>$this->email,
            'active'=>$this->active,
            'suspended'=>$this->suspended,
            'role'=>$this->roles,

        ];
    }
}
