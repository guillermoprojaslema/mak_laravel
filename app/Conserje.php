<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Conserje extends Model
{
    use SoftDeletes;

    protected $table = "conserjes";
    protected $dates = ['deleted_at'];


    public function edificio()
    {
        return $this->belongsTo('App\Edificio');
    }
}
