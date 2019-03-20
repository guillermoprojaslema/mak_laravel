<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Http\Requests\BusquedaPropiedadRequest;
use App\Pagina;
use App\Propiedad;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['paginas'] = Pagina::all();
        $data['propiedades'] = Propiedad::orderBy('updated_at','asc')->take(4)->get();
        $data['ofertas'] = Propiedad::oferta()->get();
        $data['comunas'] = Comuna::all();
        return view('propiedades.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['paginas'] = Pagina::all();
        $data['propiedad'] = Propiedad::findOrFail($id);
        return view('propiedades.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function busqueda (Request $request)
    {
        dd($request->all());
    }
}
