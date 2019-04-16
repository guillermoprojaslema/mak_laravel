<?php

use Illuminate\Database\Seeder;


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
