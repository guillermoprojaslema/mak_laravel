<?php

namespace App\Http\Controllers;

use App\Casa;
use Illuminate\Http\Request;
use App\Pagina;
use App\Sbif;

class CasasController extends Controller
{
    public function show($id)
    {
        $data['paginas'] = Pagina::all();
        $data['propiedad'] = Casa::findOrFail($id);
        $data['sbif'] = Sbif::first();
        return view('propiedades.show', $data);
    }
}
