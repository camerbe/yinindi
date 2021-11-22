<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;

    protected $primaryKey  = 'code';
    public $timestamps = false;
    protected $table='pays';
    protected $fillable = [
        'pays',
        'country',
        'email',
        'code3',


    ];
    public function membres()
    {
        return $this->hasMany(Membre::class);
    }
}
