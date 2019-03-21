<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ConserjeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando conserjes de prueba');
        $faker = Faker::create('es_ES');
        for ($i = 0; $i < 10; $i++) {
            DB::table('conserjes')->insert([
                'nombre' => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->unique()->email,
                'celular' => $faker->unique()->phoneNumber,
                'comentario' => $faker->text($maxNbChars = 100),

                'edificio_id' => rand(1, 10)
            ]);
        }

        $this->command->info('Conserjes de prueba cargados exitosamente');

    }
}
