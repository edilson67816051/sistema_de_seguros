<?php

namespace Database\Seeders;

use App\Models\Cobertura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoberturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cobertura::Create([
            'nombre'=>'Daños a Terceras Personas',
            'costo'=>'2640',
            'descripcion'=>'Paga por daño al cuerpo de otras personas que han sido causados por su automovil. Esto solo se aplica si el accidente fue su culpa',
            'estado'=>'1',
        ]);
        Cobertura::Create([
            'nombre'=>'Daños a la Propiedad',
            'costo'=>'1980',
            'descripcion'=>'Paga por daño al automovil o propiedad de otra personas, causado con su automovil, si usted es encotrado culpable',
            'estado'=>'1',
        ]);

    }
}
