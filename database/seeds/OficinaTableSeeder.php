<?php

use Illuminate\Database\Seeder;
use App\Oficina;
use Faker\Factory as Faker;


class OficinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Oficinas');
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            $property = new Oficina();
            $property->negocio = $faker->randomElement(['arriendo', 'venta']);

            $property->amoblado = $faker->randomElement([true, false]);
            $property->habitacion = $faker->randomElement([true, false]);                      // done
            $property->estacionamiento = $faker->randomElement([true, false]);                   // done
            $property->estacionamiento_visita = $faker->randomElement([true, false]);             // done
            $property->oficina_secretaria = $faker->randomElement([true, false]);          // done
            $property->sala_reunion = $faker->randomElement([true, false]);              // done
            $property->aire_acondicionado = $faker->randomElement([true, false]);          // done
            $property->red_computadora = $faker->randomElement([true, false]);          // done
            $property->alarma_incendio = $faker->randomElement([true, false]);                // done
            $property->alarma = $faker->randomElement([true, false]);                     // done
            $property->oferta = $faker->randomElement([true, false]);
            $property->destacado = $faker->randomElement([true, false]);


            $property->numero = $faker->numberBetween(0, 20200);              // done
            $property->precio = $faker->numberBetween(0, 100000);              // done
            $property->ano_construccion = $faker->year;                                       // done
            $property->metros_cuadrados_construidos = $faker->numberBetween(15, 1000);           // done
            $property->contribuciones = $faker->numberBetween(10000, 500000);             // done
            $property->bano = $faker->numberBetween(0, 10);                         // done
            $property->living = $faker->numberBetween(0, 10);                       // done
            $property->gastos_comunes = $faker->numberBetween(0, 100000);              // done
            $property->sala_privada = $faker->numberBetween(0, 10);                     // done
            $property->direccion = $faker->streetName ;                                 // done
            $property->direccion_referencial = $faker->streetAddress . ' & ' . $faker->streetAddress; // done
            $property->descripcion = $faker->text(500);
            $property->descripcion_breve= $faker->text(200);
            $property->tipo_oficina = $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]); //done
            $property->orientacion = $faker->randomElement(['Norte', 'Nororiente', 'Oriente', 'Suroriente', 'Sur', 'Surponiente', 'Poniente', 'Norponiente']); //done
            $property->tipo_cocina = $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]); //done
            $property->tipo_ventana = $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]); //done
            $property->calefaccion = $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]); //done
            $property->comentario = $faker->text(500);
            $property->tipo_piso = $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]); //done
            $property->tipo_agua_caliente = $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]); //done


            $galeria = [];

            for ($j=0; $j<5; $j++){

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
            $property->ruta = 'oficinas';

            $property->save();
        }

        $this->command->info('Oficinas cargadas exitosamente');
    }
}
