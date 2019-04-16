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
            $local_comercial = new LocalComercial();
            $local_comercial->negocio = $faker->randomElement(['arriendo', 'venta']);

            $local_comercial->alarma_incendio = $faker->randomElement([true, false]);                // done
            $local_comercial->iluminacion = $faker->randomElement([true, false]);
            $local_comercial->conexion_trifasica = $faker->randomElement([true, false]);// done
            $local_comercial->oferta = $faker->randomElement([true, false]);
            $local_comercial->destacado = $faker->randomElement([true, false]);


            $local_comercial->numero = $faker->numberBetween(0, 20200);              // done
            $local_comercial->precio = $faker->numberBetween(1, 100000);              // done
            $local_comercial->ano_construccion = $faker->year;                                       // done
            $local_comercial->metros_cuadrados = $faker->numberBetween(15, 1000);                 // done
            $local_comercial->metros_cuadrados_construidos = $faker->numberBetween(15, 1000);           // done
            $local_comercial->alto = $faker->numberBetween(1, 100);                          // done
            $local_comercial->ancho = $faker->numberBetween(1, 100);                           // done
            $local_comercial->largo = $faker->numberBetween(1, 100);                          // done
            $local_comercial->contribuciones = $faker->numberBetween(10000, 500000);             // done
            $local_comercial->gastos_comunes = $faker->numberBetween(0, 100000);              // done
            $local_comercial->sala_privada = $faker->numberBetween(0, 10);                     // done
            $local_comercial->direccion = $faker->streetName . ' #' . $faker->numberBetween(10, 100000);                                 // done
            $local_comercial->direccion_referencial = $faker->streetAddress . ' & ' . $faker->streetAddress; // done
            $local_comercial->comentario = $faker->text(500);
            $local_comercial->descripcion = $faker->text(500);
            $local_comercial->descripcion_breve = $faker->text(200);
            $local_comercial->calefaccion = $faker->randomElement(["Losa Radiante", "Radiadores", "Estufas Empotradas", "Termo Eléctrico"]); //done
            $local_comercial->tipo_piso = $faker->randomElement(["Madera", "Flotante", "Fotolaminado", "Cerámica", "Parqué", "Mármol", "Batuco", "Vinilico", "Otro"]); //done



            $galeria = [];

            for ($j = 0; $j < 5; $j++) {

                array_push($galeria, 'https://via.placeholder.com/1280x720');

            }
            $local_comercial->galeria = json_encode($galeria);
            $local_comercial->foto = 'https://via.placeholder.com/1280x720';

            $has_client = $faker->randomElement([true, false]);
            if ($has_client) {
                $local_comercial->cliente_id = $faker->numberBetween($min = 1, $max = 15); // done
            } else {
                $local_comercial->cliente_id = null;
            }
            $local_comercial->barrio_id = $faker->numberBetween(1, 20); // done
            $local_comercial->propietario_id = $faker->numberBetween($min = 16, $max = 30);
            $local_comercial->ruta = 'locales_comerciales';
            $local_comercial->save();
        }

        $this->command->info('Locales Comerciales cargados exitosamente');
    }
}
