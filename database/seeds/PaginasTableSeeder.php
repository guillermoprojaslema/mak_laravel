<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class PaginasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando Páginas de prueba...');
        $qty_records = 4;
        $faker = Faker::create('es_ES');
        for ($i = 1; $i <= $qty_records; $i++) {
            $titulo = $faker->unique()->word();
            DB::table('paginas')->insert([
                'mostrar' => true,
                'titulo' => $titulo,
                'prioridad' => $i,
                'slug' => Str::slug($titulo, '-'),
                'texto' => $faker->text(200),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')

            ]);
        }


        DB::table('paginas')->insert([
            'mostrar' => true,
            'titulo' => 'Contacto',
            'prioridad' => 5,
            'slug' => 'contacto',
            'texto' => ' ',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')

        ]);
        $this->command->info('Páginas de prueba cargados exitosamente');
    }
}
