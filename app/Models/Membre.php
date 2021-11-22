<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;

    protected $primaryKey  = 'idmembre';
    public $timestamps = false;
    protected $table='membres';
    protected $fillable = [
        'civilite',
        'nom',
        'email',
        'prenom',
        'fkpays',
        'fonction',
        'username',

    ];

    public function country()
    {
        return $this->belongsTo(Pays::class);
    }

}
