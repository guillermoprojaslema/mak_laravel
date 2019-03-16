<?php

namespace App\Http\Controllers;

use App\Pagina;
use Illuminate\Http\Request;

class PaginasController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data['pagina'] = Pagina::where('slug', $slug)->first();
        $data['paginas'] = Pagina::all();
        return view('paginas.show', $data);
    }

}
