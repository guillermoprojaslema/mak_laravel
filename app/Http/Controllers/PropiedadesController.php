<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Http\Requests\BusquedaPropiedadRequest;
use App\Pagina;
use App\Propiedad;
use App\Sbif;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use GuzzleHttp\Client;


class PropiedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $this->updateSbifValues();


        $data['paginas'] = Pagina::all();
        $data['destacados'] = Propiedad::disponibles()->destacados()->get();
        $data['ofertas'] = Propiedad::disponibles()->ofertas()->get();
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
        $data['paginas'] = Pagina::all();
        $data['propiedad'] = Propiedad::findOrFail($id);
        $data['sbif'] = Sbif::first();

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
        $data['sbif'] = Sbif::first();

        $precios = explode(",", $request->precio);

        switch ($request->divisa) {
            case "CLP":
                break;
            case "USD":
                $precios[0] = $precios[0] * $data['sbif']->dolar;
                $precios[1] = $precios[1] * $data['sbif']->dolar;
                break;
            case "UF":
                $precios[0] = $precios[0] * $data['sbif']->uf;
                $precios[1] = $precios[1] * $data['sbif']->uf;
                break;
            case "EUR":
                $precios[0] = $precios[0] * $data['sbif']->euro ;
                $precios[1] = $precios[1] * $data['sbif']->euro;
                break;
        }



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


    public
    function paginate($items, $perPage = 8, $page = null, $options = [])
    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return (new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options))->withPath('');

    }

    private
    function updateSbifValues()
    {
        $now = Carbon::now();

        if (!Carbon::parse(Sbif::first()->updated_at)->isSameDay($now)) {

            $base_uri_dolar = 'https://api.sbif.cl/api-sbifv3/recursos_api/dolar?apikey=' . env('SBIF_API_KEY') . '&formato=json';
            $base_uri_euro = 'https://api.sbif.cl/api-sbifv3/recursos_api/euro?apikey=' . env('SBIF_API_KEY') . '&formato=json';
            $base_uri_uf = 'https://api.sbif.cl/api-sbifv3/recursos_api/uf?apikey=' . env('SBIF_API_KEY') . '&formato=json';
            $base_uri_utm = 'https://api.sbif.cl/api-sbifv3/recursos_api/utm?apikey=' . env('SBIF_API_KEY') . '&formato=json';
            $base_uri_ipc = 'https://api.sbif.cl/api-sbifv3/recursos_api/ipc?apikey=' . env('SBIF_API_KEY') . '&formato=json';

            $sbif = Sbif::first();
            /*Dólar*/
            $client = new Client([
                'base_uri' => $base_uri_dolar,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->dolar = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->Dolares[0]->Valor));


            /*Euro*/
            $client = new Client([
                'base_uri' => $base_uri_euro,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->euro = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->Euros[0]->Valor));


            /*UF*/
            $client = new Client([
                'base_uri' => $base_uri_uf,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->uf = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->UFs[0]->Valor));


            /*UF*/
            $client = new Client([
                'base_uri' => $base_uri_ipc,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->ipc = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->IPCs[0]->Valor));


            /*UF*/
            $client = new Client([
                'base_uri' => $base_uri_utm,
                'timeout' => 10.0
            ]);

            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->utm = (int)str_replace(',', '.', str_replace('.', '', json_decode($res)->UTMs[0]->Valor));
            $sbif->save();
        }
    }


}
