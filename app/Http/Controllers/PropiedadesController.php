<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Http\Requests\BusquedaPropiedadRequest;
use App\Pagina;
use App\Propiedad;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

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

    public function busqueda(BusquedaPropiedadRequest $request)
    {

        $data['paginas'] = Pagina::all();
        $data['destacados'] = Propiedad::disponibles()->destacados()->get();
        $data['comunas'] = Comuna::all();

        $precios = explode(",", $request->precio);

        $propiedades = Propiedad::where('precio', '>=', $precios[0])
            ->where('precio', '<=', $precios[1])
            ->where('tipo_propiedad', $request->tipo_propiedad)
            ->where('negocio', $request->negocio)
            ->disponibles()
            ->get()
            ->filter(function ($propiedad) use ($request) {
                if ($propiedad->edificio_id) {
                    return $propiedad->edificio()->first()->barrio()->first()->comuna()->first()->id == $request->comuna_id;
                } else {
                    return $propiedad->barrio()->first()->comuna()->first()->id == $request->comuna_id;

                }
            });


        $data['propiedades'] = $this->paginate($propiedades);

        return view('propiedades.busqueda', $data);


    }


    public function paginate($items, $perPage = 8, $page = null, $options = [])
    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return (new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options))->withPath('');


    }


}
