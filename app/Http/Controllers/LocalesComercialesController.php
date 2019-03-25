<?php

namespace App\Http\Controllers;

use App\LocalComercial;
use Illuminate\Http\Request;
use App\Pagina;
use App\Sbif;

class LocalesComercialesController extends Controller
{
    public function show($id)
    {
        $data['paginas'] = Pagina::all();
        $data['propiedad'] = LocalComercial::findOrFail($id);
        $data['sbif'] = Sbif::first();
        return view('propiedades.show', $data);
    }
}
