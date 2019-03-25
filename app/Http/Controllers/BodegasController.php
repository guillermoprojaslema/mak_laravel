<?php

namespace App\Http\Controllers;

use App\Bodega;
use Illuminate\Http\Request;
use App\Pagina;
use App\Sbif;

class BodegasController extends Controller
{
    public function show($id)
    {
        $data['paginas'] = Pagina::all();
        $data['propiedad'] = Bodega::findOrFail($id);
        $data['sbif'] = Sbif::first();
        return view('propiedades.show', $data);
    }
}
