<?php

use Illuminate\Database\Seeder;
use App\Sbif;
use GuzzleHttp\Client;

class SbifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $base_uri_dolar = 'https://api.sbif.cl/api-sbifv3/recursos_api/dolar?apikey=' . env('SBIF_API_KEY') . '&formato=json';
        $base_uri_euro = 'https://api.sbif.cl/api-sbifv3/recursos_api/euro?apikey=' . env('SBIF_API_KEY') . '&formato=json';
        $base_uri_uf = 'https://api.sbif.cl/api-sbifv3/recursos_api/uf?apikey=' . env('SBIF_API_KEY') . '&formato=json';
        $base_uri_utm = 'https://api.sbif.cl/api-sbifv3/recursos_api/utm?apikey=' . env('SBIF_API_KEY') . '&formato=json';
        $base_uri_ipc = 'https://api.sbif.cl/api-sbifv3/recursos_api/ipc?apikey=' . env('SBIF_API_KEY') . '&formato=json';

        /*Dólar*/

        try {
            $sbif = new Sbif();
            $client = new Client([
                'base_uri' => $base_uri_dolar,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->dolar = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->Dolares[0]->Valor));
        } catch (Exception $exception) {
            $sbif->dolar = 1;
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
        } catch (Exception $exception) {

            $sbif->euro = 1;

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
        } catch (Exception $exception) {
            $sbif->uf = 1;

        }


        try {

            /*IPC*/
            $client = new Client([
                'base_uri' => $base_uri_ipc,
                'timeout' => 10.0
            ]);
            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->ipc = (float)str_replace(',', '.', str_replace('.', '', json_decode($res)->IPCs[0]->Valor));

        } catch (Exception $exception) {

            $sbif->ipc = 1;

        }

        try {

            /*UTM*/
            $client = new Client([
                'base_uri' => $base_uri_utm,
                'timeout' => 10.0
            ]);

            $response = $client->request('GET', '');
            $res = $response->getBody()->getContents();
            $sbif->utm = (int)str_replace(',', '.', str_replace('.', '', json_decode($res)->UTMs[0]->Valor));

        } catch (Exception $exception) {
            $sbif->utm = 1;


        }


        $sbif->save();

    }
}
