<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Http\Requests\BusquedaPropiedadRequest;
use App\Pagina;
use App\Propiedad;
use Illuminate\Http\Request;
use DB;

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
        $data['destacados'] = Propiedad::disponibles()->destacados()->get();
        $data['ofertas'] = Propiedad::disponibles()->ofertas()->get();
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

    public function busqueda(Request $request)
    {
//        dd($request->all());

        $data['paginas'] = Pagina::all();
        $data['destacados'] = Propiedad::disponibles()->destacados()->get();
        $data['comunas'] = Comuna::all();

        $precios = explode(",", $request->precio);

        /*Obtener por rango de precio*/


        $propiedades = Propiedad::where('precio', '>=', $precios[0])
            ->where('precio', '<=', $precios[1])
            ->where('tipo_propiedad', $request->tipo_propiedad)
            ->disponibles()->paginate(8);


        $data['propiedades'] = $propiedades;
        return view('propiedades.busqueda', $data);


    }

    private function filtrarPorComuna($propiedades, $request)
    {
        $propiedades = $propiedades->filter(function ($propiedad, $key) use ($request) {
            if ($propiedad->edificio_id) {
                return $propiedad->edificio()->first()->barrio()->first()->comuna()->first()->id == $request->comuna_id;
            } else {
                return $propiedad->barrio()->first()->comuna()->first()->id == $request->comuna_id;
            }

        });
        return $propiedades;
    }
}
