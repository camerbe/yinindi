<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MembreResource extends JsonResource
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
            'id'=>$this->idmembre,
            'fullname'=>$this->nom.' '.$this->prenom,
            'email'=>$this->email,
            'civilite'=>$this->civilite,
            'pays'=>$this->pays,

        ];
    }
}