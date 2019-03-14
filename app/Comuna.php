<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comuna extends Model
{
    protected $table = "comunas";

    public function region()
    {
        return $this->belongsTo('\App\Region');
    }
}
