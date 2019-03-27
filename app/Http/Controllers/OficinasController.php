<?php

namespace App\Http\Controllers;

use App\Oficina;
use Illuminate\Http\Request;
use App\Pagina;
use App\Sbif;

class OficinasController extends Controller
{
    public function show($id)
    {
        $data['paginas'] = Pagina::all();
        $data['propiedad'] = Oficina::findOrFail($id);
        $data['sbif'] = Sbif::first();
        return view('propiedades.show', $data);
    }
}
