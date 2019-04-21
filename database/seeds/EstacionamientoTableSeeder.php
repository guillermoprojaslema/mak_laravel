<?php

use Illuminate\Database\Seeder;
use App\Estacionamiento;
use Faker\Factory as Faker;

class EstacionamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Estacionamientos');
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            $property = new Estacionamiento();
            $property->negocio = $faker->randomElement(['arriendo', 'venta']);
            $property->mostrar = $faker->randomElement([true, false]);

            $property->oferta = $faker->randomElement([true, false]);



            $property->numero = $faker->numberBetween(0, 100000);              // done
            $property->precio = $faker->numberBetween(1, 100000);              // done
            $property->metros_cuadrados = $faker->numberBetween(15, 1000);                 // done
            $property->contribuciones = $faker->numberBetween(10000, 500000);             // done
            $property->comentario = $faker->text(500);
            $property->descripcion = $faker->text(500);



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
            $property->edificio_id = $faker->numberBetween($min = 1, $max = 15); // done
            $property->propietario_id = $faker->numberBetween($min = 16, $max = 30);
            $property->ruta = 'estacionamientos';

            $property->save();
        }

        $this->command->info('Estacionamientos cargados exitosamente');
    }
}
