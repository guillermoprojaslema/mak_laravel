<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LocalComercial extends Model
{
    use SoftDeletes;

    protected $table = "locales_comerciales";


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
        return $this->belongsTo('App\Edificio', 'edificio_id');
    }

    public function barrio()
    {
        return $this->belongsTo('App\Barrio');
    }

    public function scopeOfertas($query)
    {
        return $query->where('oferta', true);
    }

    public function scopeMostrar($query)
    {
        return $query->where('mostrar', true);
    }

    protected $dates = ['deleted_at'];
}
