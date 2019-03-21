<?php

use Illuminate\Database\Seeder;
use App\User;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'Guillermo Rojas',
            'email'          => 'guillermorojaslema@gmail.com',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
            'role_id'        => 1,
        ]);

        User::create([
            'name'           => 'María Lema',
            'email'          => 'malema@gmail.com',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
            'role_id'        => 1,
        ]);
    }
}
