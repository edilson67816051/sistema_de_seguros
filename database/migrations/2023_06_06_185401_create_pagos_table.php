<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('metodo')->nullable(); 
            $table->string('tipo_pago');      
            $table->double('monto'); 
            $table->timestamp('fecha_limite_pago')->nullable();
            $table->timestamp('fecha_pago')->nullable();
            $table->string('comprobante')->nullable();
            $table->string('estado');    
            $table->unsignedBigInteger('poliza_id');  
            $table->unsignedBigInteger('users_id');  
            
            $table->timestamps();

            $table->foreign('poliza_id')
            ->references('id')->on('polizas');

            $table->foreign('users_id')
            ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
};
