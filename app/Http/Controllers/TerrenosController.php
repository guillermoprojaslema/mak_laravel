<?php

namespace App\Http\Controllers;

use App\Terreno;
use Illuminate\Http\Request;
use App\Pagina;
use App\Sbif;

class TerrenosController extends Controller
{
    public function show($id)
    {
        $data['paginas'] = Pagina::all();
        $data['propiedad'] = Terreno::findOrFail($id);
        $data['sbif'] = Sbif::first();
        return view('propiedades.show', $data);
    }
}
