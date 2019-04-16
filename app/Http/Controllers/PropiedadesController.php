<?php

namespace App\Http\Controllers;

use App\Apartamento;
use App\Bodega;
use App\Casa;
use App\Comuna;
use App\Estacionamiento;
use App\Http\Requests\BusquedaPropiedadRequest;
use App\LocalComercial;
use App\Oficina;
use App\Pagina;
use App\Sbif;
use App\Terreno;
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
        $data['ofertas'] = $this->propiedadesOfertas();
        $data['comunas'] = Comuna::all();
        $data['sbif'] = Sbif::first();


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
        //
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
        $data['destacados'] = $this->propiedadesDestacadas();
        $data['comunas'] = Comuna::all();
        $data['sbif'] = Sbif::first();


        switch ($request->divisa) {
            case "CLP":
                break;
            case "USD":
                $request->min_precio = $request->min_precio * $data['sbif']->dolar;
                $request->max_precio = $request->max_precio * $data['sbif']->dolar;
                break;
            case "UF":
                $request->min_precio = $request->min_precio * $data['sbif']->uf;
                $request->max_precio = $request->max_precio * $data['sbif']->uf;
                break;
            case "EUR":
                $request->min_precio = $request->min_precio * $data['sbif']->euro;
                $request->max_precio = $request->max_precio * $data['sbif']->euro;
                break;
        }


        switch ($request->tipo_propiedad) {
            case "casa":

                $propiedades = Casa::where('precio', '>=', $request->min_precio)
                    ->where('precio', '<=', $request->max_precio)
                    ->where('negocio', $request->negocio)
                    ->disponibles()
                    ->get()
                    ->filter(function ($propiedad) use ($request) {
                        return $propiedad->barrio()->first()->comuna()->first()->id == $request->comuna_id;
                    });
                break;
            case "apartamento":

                $propiedades = Apartamento::where('precio', '>=', $request->min_precio)
                    ->where('precio', '<=', $request->max_precio)
                    ->where('negocio', $request->negocio)
                    ->disponibles()
                    ->get()
                    ->filter(function ($propiedad) use ($request) {
                        return $propiedad->edificio()->first()->barrio()->first()->comuna()->first()->id == $request->comuna_id;
                    });
                break;
            case "oficina":

                $propiedades = Oficina::where('precio', '>=', $request->min_precio)
                    ->where('precio', '<=', $request->max_precio)
                    ->where('negocio', $request->negocio)
                    ->disponibles()
                    ->get()
                    ->filter(function ($propiedad) use ($request) {
                        return $propiedad->edificio()->first()->barrio()->first()->comuna()->first()->id == $request->comuna_id;
                    });

                break;
            case "tienda_comercial":
                $propiedades = LocalComercial::where('precio', '>=', $request->min_precio)
                    ->where('precio', '<=', $request->max_precio)
                    ->where('negocio', $request->negocio)
                    ->disponibles()
                    ->get()
                    ->filter(function ($propiedad) use ($request) {
                        return $propiedad->barrio()->first()->comuna()->first()->id == $request->comuna_id;
                    });
                break;

            case "bodega":
                $propiedades = Bodega::where('precio', '>=', $request->min_precio)
                    ->where('precio', '<=', $request->max_precio)
                    ->where('negocio', $request->negocio)
                    ->disponibles()
                    ->get()
                    ->filter(function ($propiedad) use ($request) {
                        return $propiedad->barrio()->first()->comuna()->first()->id == $request->comuna_id;
                    });
                break;
            case "terreno":

                $propiedades = Terreno::where('precio', '>=', $request->min_precio)
                    ->where('precio', '<=', $request->max_precio)
                    ->where('negocio', $request->negocio)
                    ->disponibles()
                    ->get()
                    ->filter(function ($propiedad) use ($request) {
                        return $propiedad->barrio()->first()->comuna()->first()->id == $request->comuna_id;
                    });
                break;
            case "estacionamiento":
                $propiedades = Estacionamiento::where('precio', '>=', $request->min_precio)
                    ->where('precio', '<=', $request->max_precio)
                    ->where('negocio', $request->negocio)
                    ->disponibles()
                    ->get()
                    ->filter(function ($propiedad) use ($request) {
                        return $propiedad->edificio()->first()->barrio()->first()->comuna()->first()->id == $request->comuna_id;
                    });
                break;
        }


        $data['propiedades'] = $this->paginate($propiedades);

        return view('propiedades.busqueda', $data);


    }


    public function paginate($items, $perPage = 8, $page = null, $options = [])
    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return (new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options))->withPath('');

    }



    public static function propiedadesOfertas()
    {
        $propiedades_ofertas = collect();
        $casas_ofertas = Casa::disponibles()->get();
        $apartamentos_ofertas = Apartamento::disponibles()->ofertas()->get();
        $oficinas_ofertas = Oficina::disponibles()->ofertas()->get();
        $locales_comerciales_ofertas = LocalComercial::disponibles()->ofertas()->get();
        $terrenos_ofertas = Terreno::disponibles()->ofertas()->get();
        $estacionamientos_ofertas = Estacionamiento::disponibles()->ofertas()->get();

        $propiedades_ofertas = $propiedades_ofertas->merge($casas_ofertas)
            ->merge($apartamentos_ofertas)
            ->merge($oficinas_ofertas)
            ->merge($locales_comerciales_ofertas)
            ->merge($terrenos_ofertas)
            ->merge($estacionamientos_ofertas)
            ->sortBy('updated_at')->take(setting('site.cantidad_destacados', 3));

        return $propiedades_ofertas;

    }


}
