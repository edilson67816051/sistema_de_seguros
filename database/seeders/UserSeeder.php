<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::Create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('12345678'),
            'ci'=>'9674845',
            'celular'=>'67816051',
            'usuario'=>'1',
            'cliente'=>'0',
            'estado'=>'1',
        ])->assignRole('admin');

        User::Create([
            'name'=>'Juan',
            'apellido_p'=>'Montaño',
            'apellido_m'=>'Miranda',
            'name'=>'Juan',
            'email'=>'j@gmail.com',
            'password'=> bcrypt('12345678'),
            'ci'=>'9674865',
            'celular'=>'67816051',
            'usuario'=>'0',
            'cliente'=>'1',
            'estado'=>'1',
        ])->assignRole('cliente');

    }
}
