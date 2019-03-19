<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Propiedad extends Model
{
    use SoftDeletes;

    protected $table = "propiedades";



    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'cliente_id');

    }

    public function propietario()
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

    public function scopeOferta($query)
    {
        return $query->where('oferta', true);
    }

    protected $dates = ['deleted_at'];
}
