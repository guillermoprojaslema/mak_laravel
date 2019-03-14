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
                'direccion' => $faker->unique()->streetName,
                'direccion_referencial' => $faker->streetName . ' & ' . $faker->streetName,
                'direccion_numero' => $faker->buildingNumber,
                'telefono' => $faker->unique()->phoneNumber,
                'pisos' => 1,
                'estacionamiento_visita' => $faker->numberBetween(1, 5),
                'ano_construccion' => $faker->numberBetween(1900, 2017),
                'comentario' => $faker->text(100),
                'barrio_id' => 1
            ]);
        }

        $this->command->info('Edificios de prueba cargadas exitosamente');

    }
}
