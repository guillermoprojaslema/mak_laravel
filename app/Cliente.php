<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    use SoftDeletes;
    protected $table = "clientes";
    protected $dates = ['deleted_at'];

    public function propietario()
    {
        return $this->hasMany('App\Propiedad', 'propetario_id');

    }

    public function cliente()
    {
        return $this->hasMany('App\Propiedad', 'cliente_id');
    }
}
