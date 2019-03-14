<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Regiones...');
        DB::table('regiones')->insert([
                ['nombre' => 'Metropolitana de Santiago'],
//                ['nombre' => 'Arica y Parinacota'],
//                ['nombre' => 'Tarapacá'],
//                ['nombre' => 'Antofagasta'],
//                ['nombre' => 'Atacama'],
//                ['nombre' => 'Coquimbo'],
//                ['nombre' => 'Valparaíso'],
//                ['nombre' => 'Libertador General Bernardo O\'Higgins'],
//                ['nombre' => 'Maule'],
//                ['nombre' => 'Ñuble'],
//                ['nombre' => 'Bío Bío'],
//                ['nombre' => 'La Araucanía'],
//                ['nombre' => 'Los Ríos'],
//                ['nombre' => 'Los Lagos'],
//                ['nombre' => 'Aysén del General Carlos Ibáñez del Campo'],
//                ['nombre' => 'Magallanes y Antártica Chilena'],
            ]
        );
        $this->command->info('Regiones cargadas exitosamente');
    }
}
