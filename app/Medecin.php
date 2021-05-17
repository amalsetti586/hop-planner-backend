<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['id','email','password','nom', 'prenom' , 'specialitee', 'grade'];
   
}
