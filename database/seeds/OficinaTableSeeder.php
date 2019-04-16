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
            $property->oficina_secretaria = $faker->randomElement([true, false]);          // done
            $property->sala_reunion = $faker->randomElement([true, false]);              // done
            $property->aire_acondicionado = $faker->randomElement([true, false]);          // done
            $property->red_computadora = $faker->randomElement([true, false]);          // done
            $property->alarma_incendio = $faker->randomElement([true, false]);                // done
            $property->alarma = $faker->randomElement([true, false]);                     // done
            $property->oferta = $faker->randomElement([true, false]);
            $property->destacado = $faker->randomElement([true, false]);


            $property->numero = $faker->numberBetween(0, 20200);              // done
            $property->precio = $faker->numberBetween(1, 100000);              // done
            $property->metros_cuadrados_construidos = $faker->numberBetween(15, 1000);           // done
            $property->contribuciones = $faker->numberBetween(10000, 500000);             // done
            $property->bano = $faker->numberBetween(0, 10);                         // done
            $property->living = $faker->numberBetween(0, 10);                       // done
            $property->gastos_comunes = $faker->numberBetween(0, 100000);              // done
            $property->sala_privada = $faker->numberBetween(0, 10);                     // done
            $property->descripcion = $faker->text(500);
            $property->descripcion_breve= $faker->text(200);
            $property->orientacion = $faker->randomElement(['Norte', 'Nororiente', 'Oriente', 'Suroriente', 'Sur', 'Surponiente', 'Poniente', 'Norponiente']); //done
            $property->tipo_cocina = $faker->randomElement(["Normal", "Americana", "Isla"]); //done
            $property->tipo_ventana = $faker->randomElement(["Madera","Aluminio Anonizado", "PVC","Hierro"]); //done
            $property->calefaccion = $faker->randomElement(["Losa Radiante", "Radiadores", "Estufas Empotradas", "Termo Eléctrico"]); //done
            $property->tipo_piso = $faker->randomElement(["Madera","Flotante","Fotolaminado","Cerámica","Parqué","Mármol", "Batuco","Vinilico","Otro"]); //done
            $property->tipo_agua_caliente = $faker->randomElement(["Calefacción Central","Calefont"]); //done
            $property->comentario = $faker->text(500);



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
