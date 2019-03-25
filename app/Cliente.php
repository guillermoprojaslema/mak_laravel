<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    use SoftDeletes;
    protected $table = "clientes";
    protected $dates = ['deleted_at'];

    public function propietario_casa()
    {
        return $this->hasMany('App\Casa', 'propetario_id');

    }

    public function cliente_casa()
    {
        return $this->hasMany('App\Casa', 'cliente_id');
    }

    public function propietario_apartamento()
    {
        return $this->hasMany('App\Apartamento', 'propetario_id');

    }

    public function cliente_apartamento()
    {
        return $this->hasMany('App\Apartamento', 'cliente_id');
    }

    public function propietario_oficina()
    {
        return $this->hasMany('App\Oficina', 'propetario_id');

    }

    public function cliente_oficina()
    {
        return $this->hasMany('App\Oficina', 'cliente_id');
    }

    public function propietario_local_comercial()
    {
        return $this->hasMany('App\LocalComercial', 'propetario_id');

    }

    public function cliente_local_comercial()
    {
        return $this->hasMany('App\LocalComercial', 'cliente_id');
    }

    public function propietario_terreno()
    {
        return $this->hasMany('App\Terreno', 'propetario_id');

    }

    public function cliente_terreno()
    {
        return $this->hasMany('App\Terreno', 'cliente_id');
    }

    public function propietario_estacionamiento()
    {
        return $this->hasMany('App\Estacionamiento', 'propetario_id');

    }

    public function cliente_estacionamiento()
    {
        return $this->hasMany('App\Estacionamiento', 'cliente_id');
    }

    public function propietario_bodega()
    {
        return $this->hasMany('App\Apartamento', 'propetario_id');

    }

    public function cliente_bodega()
    {
        return $this->hasMany('App\Bodega', 'cliente_id');
    }


}
