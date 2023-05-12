<?php

namespace Database\Seeders;

use App\Models\Vehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehiculo::Create([
            'users_id'=>'2',
            'modelo'=>'kia',
            'marca'=>'Kia-2023',
            'placa'=>'BOL-57678',
            'combustible'=>'Gasolina',
            'potencia'=>'120',
            'altura'=> '1.40',
            'anchura'=>'3.20',
            'nro_asiento'=>'4',
            'descripcion'=>'El auto movil tubo un siniestro ',
            'imagen'=>'1.jpg',
            'estado'=>'1',
        ]);
    }
}
