<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edificio extends Model
{
    use SoftDeletes;

    protected $table = "edificios";

    protected $dates = ['deleted_at'];


    public function barrio () {
        return $this->belongsTo('App\Barrio');
    }

    public function conserjes(){
        return $this->hasMany('App\Conserje');
    }
}
