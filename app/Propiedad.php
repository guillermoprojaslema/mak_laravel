<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Propiedad extends Model
{
    use SoftDeletes;

    protected $table = "properties";



    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'cliente_id');

    }

    public function propetario()
    {
        return $this->belongsTo('App\Cliente', 'propietario_id');
    }

    public function edificio()
    {
        return $this->belongsTo('App\Edificio');
    }

    public function barrio()
    {
        return $this->belongsTo('App\Barrio');
    }

    protected $dates = ['deleted_at'];
}
