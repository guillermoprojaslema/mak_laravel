<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(ComunaTableSeeder::class);
        if (env('APP_ENV') != 'production') {
            $this->call(ClienteTableSeeder::class);
            $this->call(BarrioTableSeeder::class);
            $this->call(EdificioTableSeeder::class);
            $this->call(ConserjeTableSeeder::class);
            $this->call(CasaTableSeeder::class);
            $this->call(ApartamentoTableSeeder::class);
            $this->call(LocalComercialTableSeeder::class);
            $this->call(OficinaTableSeeder::class);
            $this->call(EstacionamientoTableSeeder::class);
            $this->call(BodegaTableSeeder::class);
            $this->call(TerrenoTableSeeder::class);
            $this->call(PaginasTableSeeder::class);
        }
        $this->call(EmpleadosTableSeeder::class);
        $this->call(SbifTableSeeder::class);

    }
}
