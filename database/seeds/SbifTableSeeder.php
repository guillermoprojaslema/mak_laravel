<?php

use Illuminate\Database\Seeder;
use App\Sbif;

class SbifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sbif = new Sbif();
        $sbif->id = 0;
        $sbif->dolar = 0;
        $sbif->euro = 0;
        $sbif->uf = 0;
        $sbif->ipc = 0;
        $sbif->utm = 0;
        $sbif->save();

    }
}
