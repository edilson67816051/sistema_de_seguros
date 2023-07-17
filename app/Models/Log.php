<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{   
    use HasFactory;
    protected $fillable = [
        'login_time',
        'action',
        'ip_address',
        // Otros campos permitidos para asignación masiva
    ];
    
}
