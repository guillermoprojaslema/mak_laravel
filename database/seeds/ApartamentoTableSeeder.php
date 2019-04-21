<?php

use Illuminate\Database\Seeder;
use App\Apartamento;
use Faker\Factory as Faker;


class ApartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Apartamentos');
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            $property = new Apartamento();
            $property->negocio = $faker->randomElement(['arriendo', 'venta']);

            $property->amoblado = $faker->randomElement([true, false]);
            $property->mostrar = $faker->randomElement([true, false]);
            $property->habitacion = $faker->randomElement([true, false]);                      // done
            $property->condominio = $faker->randomElement([true, false]);               // done
            $property->hall = $faker->randomElement([true, false]);                      // done
            $property->living_comedor = $faker->randomElement([true, false]);            // done
            $property->estacionamiento = $faker->randomElement([true, false]);                   // done
            $property->estacionamiento_visita = $faker->randomElement([true, false]);             // done
            $property->aire_acondicionado = $faker->randomElement([true, false]);          // done
            $property->alarma = $faker->randomElement([true, false]);                     // done
            $property->logia = $faker->randomElement([true, false]);                     // done
            $property->terraza = $faker->randomElement([true, false]);                   // done
            $property->pieza_planchado = $faker->randomElement([true, false]);                   // done
            $property->bano_visita = $faker->randomElement([true, false]);            // done
            $property->dormitorio_visita = $faker->randomElement([true, false]);             // done
            $property->piscina = $faker->randomElement([true, false]);             // done
            $property->gimnasio = $faker->randomElement([true, false]);                       // done
            $property->sala_evento = $faker->randomElement([true, false]);                // done
            $property->sauna = $faker->randomElement([true, false]);                     // done
            $property->lavanderia = $faker->randomElement([true, false]);                   // done
            $property->casillero = $faker->randomElement([true, false]);                   // done
            $property->bodega = $faker->randomElement([true, false]);
            $property->oferta = $faker->randomElement([true, false]);



            $property->numero = $faker->numberBetween(0, 20200);              // done
            $property->precio = $faker->numberBetween(1, 100000);              // done
            $property->metros_cuadrados = $faker->numberBetween(15, 1000);                 // done
            $property->avaluo_fiscal = $faker->numberBetween(10000000, 500000000);      // done
            $property->contribuciones = $faker->numberBetween(10000, 500000);             // done
            $property->dormitorio = $faker->numberBetween(0, 10);                          // done
            $property->suite = $faker->numberBetween(0, 10);                            // done
            $property->walking_closet = $faker->numberBetween(0, 10);                   // done
            $property->closet = $faker->numberBetween(0, 10);                           // done
            $property->bano = $faker->numberBetween(0, 10);                         // done
            $property->living = $faker->numberBetween(0, 10);                       // done
            $property->escritorio = $faker->numberBetween(0, 10);                             // done
            $property->sala_estar = $faker->numberBetween(0, 10);                     // done
            $property->gastos_comunes = $faker->numberBetween(0, 100000);              // done
            $property->rol = $faker->unique()->ean13;              // done
            $property->comentario = $faker->text(500);
            $property->descripcion = $faker->text(500);

            $property->orientacion = $faker->randomElement(['Norte', 'Nororiente', 'Oriente', 'Suroriente', 'Sur', 'Surponiente', 'Poniente', 'Norponiente']); //done
            $property->tipo_cocina = $faker->randomElement(["Normal", "Americana", "Isla"]); //done
            $property->tipo_ventana = $faker->randomElement(["Madera", "Aluminio Anonizado", "PVC", "Hierro"]); //done
            $property->tipo_agua_caliente = $faker->randomElement(["Calefacción Central", "Calefont"]); //done
            $property->tipo_piso = $faker->randomElement(["Madera", "Flotante", "Fotolaminado", "Cerámica", "Parqué", "Mármol", "Batuco", "Vinilico", "Otro"]); //done
            $property->calefaccion = $faker->randomElement(["Losa Radiante", "Radiadores", "Estufas Empotradas", "Termo Eléctrico"]); //done


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
            $property->ruta = 'apartamentos';
            $property->save();
        }

        $this->command->info('Apartamentos cargados exitosamente');
    }
}
