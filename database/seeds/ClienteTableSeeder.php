<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando clientes de prueba');
        $qty_records = 50;
        $faker = Faker::create('es_ES');
        for ($i = 0; $i < $qty_records; $i++) {
            DB::table('clientes')->insert([
                'nombre' => $faker->firstName . ' ' . $faker->lastName,
                'direccion' => $faker->address,
                'pais' => $faker->country,
                'sexo' => $faker->randomElement([true, false]), // True = male
                'email' => $faker->email,
                'telefono' => $faker->unique()->phoneNumber,
                'tipo' => $faker->randomElement(['cliente', 'propietario']),
                'celular' => $faker->unique()->phoneNumber,
                'comentario' => $faker->text($maxNbChars = 100),
            ]);
        }
        $this->command->info('Clientes de prueba cargados exitosamente');


    }
}
