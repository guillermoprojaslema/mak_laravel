<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Propiedad;


class PropiedadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Propiedades');
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            $property = new Propiedad();
            $property->tipo_propiedad = $faker->randomElement(['casa', 'apartamento', 'oficina', 'tienda_comercial', 'bodega', 'terreno', 'estacionamiento']); // done
            $property->negocio = $faker->randomElement(['arriendo', 'venta']);

            $property->amoblado = $faker->randomElement([true, false]);
            $property->habitacion = $faker->randomElement([true, false]);                      // done
            $property->condominio = $faker->randomElement([true, false]);               // done
            $property->hall = $faker->randomElement([true, false]);                      // done
            $property->living_comedor = $faker->randomElement([true, false]);            // done
            $property->estacionamiento = $faker->randomElement([true, false]);                   // done
            $property->estacionamiento_visita = $faker->randomElement([true, false]);             // done
            $property->oficina_secretaria = $faker->randomElement([true, false]);          // done
            $property->sala_reunion = $faker->randomElement([true, false]);              // done
            $property->planta_libre = $faker->randomElement([true, false]);
            $property->aire_acondicionado = $faker->randomElement([true, false]);          // done
            $property->red_computadora = $faker->randomElement([true, false]);          // done
            $property->alarma_incendio = $faker->randomElement([true, false]);                // done
            $property->alarma = $faker->randomElement([true, false]);                     // done
            $property->iluminacion = $faker->randomElement([true, false]);
            $property->conexion_trifasica = $faker->randomElement([true, false]);// done
            $property->logia = $faker->randomElement([true, false]);                     // done
            $property->terraza = $faker->randomElement([true, false]);                   // done
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
            $property->ano_construccion = $faker->year;                                       // done
            $property->metros_cuadrados = $faker->numberBetween(15, 1000);                 // done
            $property->metros_cuadrados_construidos = $faker->numberBetween(15, 1000);           // done
            $property->alto = $faker->numberBetween(1, 100);                          // done
            $property->ancho = $faker->numberBetween(1, 100);                           // done
            $property->largo = $faker->numberBetween(1, 100);                          // done
            $property->avaluo_fiscal = $faker->numberBetween(10000000, 500000000);      // done
            $property->contribuciones = $faker->numberBetween(10000, 500000);             // done
            $property->dormitorio = $faker->numberBetween(0, 10);                          // done
            $property->suite = $faker->numberBetween(0, 10);                            // done
            $property->walking_closet = $faker->numberBetween(0, 10);                   // done
            $property->closet = $faker->numberBetween(0, 10);                           // done
            $property->bano = $faker->numberBetween(0, 10);                         // done
            $property->living = $faker->numberBetween(0, 10);                       // done
            $property->escritorio = $faker->numberBetween(0, 10);                             // done
            $property->gastos_comunes = $faker->numberBetween(0, 100000);              // done
            $property->sala_privada = $faker->numberBetween(0, 10);                     // done
            $property->direccion = $faker->streetName ;                                 // done
            $property->direccion_referencial = $faker->streetAddress . ' & ' . $faker->streetAddress; // done
            $property->comentario = $faker->text(500);
            $property->descripcion = $faker->text(500);
            $property->descripcion_breve= $faker->text(200);
            $property->orientacion = $faker->randomElement(['Norte', 'Nororiente', 'Oriente', 'Suroriente', 'Sur', 'Surponiente', 'Poniente', 'Norponiente']); //done
            $property->tipo_casa = $faker->randomElement(["Chilena","Mediterránea", "Georgiana", "Mexicana", "Canadiense", "Ingles", "Francés"]); //done
            $property->tipo_cocina = $faker->randomElement(["Normal", "Americana", "Isla"]); //done
            $property->tipo_ventana = $faker->randomElement(["Madera","Aluminio Anonizado", "PVC","Hierro"]); //done
            $property->calefaccion = $faker->randomElement(["Losa Radiante", "Radiadores", "Estufas Empotradas", "Termo Eléctrico"]); //done
            $property->tipo_piso = $faker->randomElement(["Madera","Flotante","Fotolaminado","Cerámica","Parqué","Mármol", "Batuco","Vinilico","Otro"]); //done
            $property->tipo_agua_caliente = $faker->randomElement(["Calefacción Central","Calefont"]); //done



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
            $in_building = $faker->randomElement([true, false]);

            if ($in_building == false || $property->tipo_propiedad == 'casa' || $property->tipo_propiedad == 'terreno') {
                $property->edificio_id = null;
                $property->barrio_id = $faker->numberBetween(1, 20); // done
            } else {
                $property->edificio_id = 1; // done
                $property->barrio_id = null; // done
            }

            $property->propietario_id = $faker->numberBetween($min = 16, $max = 30);
            $property->save();
        }

        $this->command->info('Propiedades cargadas exitosamente');

    }
}
