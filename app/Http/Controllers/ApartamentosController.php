<?php

namespace App\Http\Controllers;

use App\Apartamento;
use App\Pagina;
use App\Sbif;
use Illuminate\Http\Request;

class ApartamentosController extends Controller
{
    public function show($id)
    {
        $data['paginas'] = Pagina::all();
        $data['propiedad'] = Apartamento::findOrFail($id);
        $data['sbif'] = Sbif::first();
        return view('propiedades.show', $data);
    }
}
