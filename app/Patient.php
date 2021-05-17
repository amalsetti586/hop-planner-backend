<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $timestamps = false;

    protected $fillable = ['id','email','nom', 'prenom' , 'maladie', 'photo','sexe'];

}
