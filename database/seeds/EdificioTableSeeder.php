<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EdificioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Edificios de prueba');
        $qty_records = 15;
        $faker = Faker::create('es_ES');
        for ($i = 0; $i < $qty_records; $i++) {
            DB::table('edificios')->insert([
                'nombre' => $faker->name,
                'direccion' => $faker->streetName . ' #' . $faker->numberBetween(10, 100000),
                'direccion_referencial' => $faker->streetName . ' & ' . $faker->streetName,
                'telefono' => $faker->unique()->phoneNumber,
                'pisos' => $faker->numberBetween(1, 30),
                'estacionamiento_visita' => $faker->numberBetween(1, 5),
                'ano_construccion' => $faker->numberBetween(1900, 2017),
                'comentario' => $faker->text(100),
                'barrio_id' => $faker->numberBetween(1, 20)
            ]);
        }

        $this->command->info('Edificios de prueba cargadas exitosamente');

    }
}
