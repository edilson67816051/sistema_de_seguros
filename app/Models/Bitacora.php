<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detalle_bitacora;

class Bitacora extends Model
{
    use HasFactory;


    public function bitacora($operacion){
        $bitacora = Bitacora::where('activo', '1')
            ->orderByDesc('id')
            ->limit(1)
            ->first(); 
        $detalle_bitacora = new Detalle_bitacora();    
        $detalle_bitacora->operacion=$operacion;
        $detalle_bitacora->bitacora_id=$bitacora->id;
        $detalle_bitacora->save();
    }
}
