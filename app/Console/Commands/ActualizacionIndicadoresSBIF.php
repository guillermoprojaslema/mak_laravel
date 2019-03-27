<?php

namespace App\Console\Commands;

use App\Sbif;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class ActualizacionIndicadoresSBIF extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:sbif';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza periódicamente los valores de la SBIF';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $base_uri_dolar = 'https://api.sbif.cl/api-sbifv3/recursos_api/dolar?apikey=' . env('SBIF_API_KEY') . '&formato=json';
        $base_uri_euro = 'https://api.sbif.cl/api-sbifv3/recursos_api/euro?apikey=' . env('SBIF_API_KEY') . '&formato=json';
        $base_uri_uf = 'https://api.sbif.cl/api-sbifv3/recursos_api/uf?apikey=' . env('SBIF_API_KEY') . '&formato=json';
        $base_uri_utm = 'https://api.sbif.cl/api-sbifv3/recursos_api/utm?apikey=' . env('SBIF_API_KEY') . '&formato=json';
        $base_uri_ipc = 'https://api.sbif.cl/api-sbifv3/recursos_api/ipc?apikey=' . env('SBIF_API_KEY') . '&formato=json';


        try {
            /*Dólar*/
            $sbif = Sbif::first();
            $client = new Client([
                'base_uri' => $base_uri_dolar,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->dolar = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->Dolares[0]->Valor));
            $this->info('Dólar actualizado');


        } catch (\Exception $exception) {
            $this->info('No se pudo actualizar dólar');
        }


        try {
            /*Euro*/
            $client = new Client([
                'base_uri' => $base_uri_euro,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->euro = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->Euros[0]->Valor));
            $this->info('Euro actualizado');


        } catch (\Exception $exception) {
            $this->info('No se pudo actualizar euro');

        }


        try {
            /*UF*/
            $client = new Client([
                'base_uri' => $base_uri_uf,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->uf = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->UFs[0]->Valor));
            $this->info('UF actualizada');

        } catch (\Exception $exception) {
            $this->info('No se pudo actualizar uf');

        }


        try {
            /*UF*/
            $client = new Client([
                'base_uri' => $base_uri_ipc,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->ipc = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->IPCs[0]->Valor));
            $this->info('IPC actualizado');

        } catch (\Exception $exception) {
            $this->info('No se pudo actualizar ipc');

        }


        try {
            /*UF*/
            $client = new Client([
                'base_uri' => $base_uri_utm,
                'timeout' => 10.0
            ]);

            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->utm = (int)str_replace(',', '.', str_replace('.', '', json_decode($res)->UTMs[0]->Valor));
            $this->info('UTM actualizada');
        } catch (\Exception $exception) {
            $this->info('No se pudo actualizar utm');
        }
        $sbif->save();


    }
}
