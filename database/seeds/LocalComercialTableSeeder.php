<?php

use Illuminate\Database\Seeder;
use App\LocalComercial;
use Faker\Factory as Faker;


class LocalComercialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Locales Comerciales');
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            $property = new LocalComercial();
            $property->negocio = $faker->randomElement(['arriendo', 'venta']);
            $property->mostrar = $faker->randomElement([true, false]);
            $property->alarma_incendio = $faker->randomElement([true, false]);                // done
            $property->iluminacion = $faker->randomElement([true, false]);
            $property->conexion_trifasica = $faker->randomElement([true, false]);// done
            $property->oferta = $faker->randomElement([true, false]);
            $property->destacado = $faker->randomElement([true, false]);


            $property->numero = $faker->numberBetween(0, 20200);              // done
            $property->precio = $faker->numberBetween(1, 100000);              // done
            $property->ano_construccion = $faker->year;                                       // done
            $property->metros_cuadrados = $faker->numberBetween(15, 1000);                 // done
            $property->metros_cuadrados_construidos = $faker->numberBetween(15, 1000);           // done
            $property->alto = $faker->numberBetween(1, 100);                          // done
            $property->ancho = $faker->numberBetween(1, 100);                           // done
            $property->largo = $faker->numberBetween(1, 100);                          // done
            $property->contribuciones = $faker->numberBetween(10000, 500000);             // done
            $property->gastos_comunes = $faker->numberBetween(0, 100000);              // done
            $property->sala_privada = $faker->numberBetween(0, 10);                     // done
            $property->direccion = $faker->streetName . ' #' . $faker->numberBetween(10, 100000);                                 // done
            $property->direccion_referencial = $faker->streetAddress . ' & ' . $faker->streetAddress; // done
            $property->comentario = $faker->text(500);
            $property->descripcion = $faker->text(500);
            $property->calefaccion = $faker->randomElement(["Losa Radiante", "Radiadores", "Estufas Empotradas", "Termo Eléctrico"]); //done
            $property->tipo_piso = $faker->randomElement(["Madera", "Flotante", "Fotolaminado", "Cerámica", "Parqué", "Mármol", "Batuco", "Vinilico", "Otro"]); //done



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
            $property->ruta = 'locales_comerciales';
            $property->save();
        }

        $this->command->info('Locales Comerciales cargados exitosamente');
    }
}
