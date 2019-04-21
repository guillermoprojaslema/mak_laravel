<?php

use Illuminate\Database\Seeder;
use App\Terreno;
use Faker\Factory as Faker;

class TerrenoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Terrenos');
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            $property = new Terreno();
            $property->negocio = $faker->randomElement(['arriendo', 'venta']);
            $property->oferta = $faker->randomElement([true, false]);
            $property->mostrar = $faker->randomElement([true, false]);

            $property->precio = $faker->numberBetween(1, 100000);              // done
            $property->ancho = $faker->numberBetween(1, 100);                           // done
            $property->largo = $faker->numberBetween(1, 100);                          // done
            $property->metros_cuadrados = $faker->numberBetween(1, 100000);                          // done
            $property->contribuciones = $faker->numberBetween(10000, 500000);             // done
            $property->direccion = $faker->streetName . ' #' . $faker->numberBetween(10, 100000);                                 // done
            $property->direccion_referencial = $faker->streetAddress . ' & ' . $faker->streetAddress; // done
            $property->descripcion = $faker->text(500);

            $property->comentario = $faker->text(500);
            $galeria = [];
            for ($j = 0; $j < 5; $j++) {
                array_push($galeria, 'https://via.placeholder.com/1280x720');
            }
            $property->galeria = json_encode($galeria);
            $property->foto = 'https://via.placeholder.com/1280x720';

            $has_client = $faker->randomElement([true, false]);
            if ($has_client) {
                $property->cliente_id = $faker->numberBetween($min = 1, $max = 15); // done
            } else {
                $property->cliente_id = null;
            }

            $property->barrio_id = $faker->numberBetween(1, 20); // done
            $property->propietario_id = $faker->numberBetween($min = 16, $max = 30);
            $property->ruta = 'terrenos';
            $property->save();
        }

        $this->command->info('Terrenos cargados exitosamente');
    }
}
