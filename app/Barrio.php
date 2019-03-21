<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Barrio extends Model
{
    use SoftDeletes;

    protected $table = "barrios";
    protected $dates = ['deleted_at'];


    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }

    public function edificios()
    {
        return $this->hasMany('App\Edificio');
    }
}
