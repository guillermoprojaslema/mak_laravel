<?php

namespace App\Http\Controllers;

use App\Estacionamiento;
use Illuminate\Http\Request;
use App\Pagina;
use App\Sbif;

class EstacionamientosController extends Controller
{
    public function show($id)
    {
        $data['paginas'] = Pagina::all();
        $data['propiedad'] = Estacionamiento::findOrFail($id);
        $data['sbif'] = Sbif::first();
        return view('propiedades.show', $data);
    }
}
