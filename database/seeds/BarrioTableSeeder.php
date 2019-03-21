<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BarrioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Barrios de prueba');
        $qty_records = 20;
        $faker = Faker::create('es_ES');

        for ($i = 0; $i < $qty_records; $i++) {
            DB::table('barrios')->insert([
                'nombre' => $faker->unique()->name,
                'comentario' => $faker->text(150),
                'comuna_id' => $faker->randomElement([14, 32, 33]) // Puente alto, Vitacura, Las Condes
            ]);
        }

        $this->command->info('Barrios de prueba cargados exitosamente');

    }
}
