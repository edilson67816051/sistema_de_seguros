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
        Schema::create('polizas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nro_poliza');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_final');
            $table->string('moneda');
            $table->string('metodo_pago');
            $table->double('prima_neta');  
            $table->double('derecho_poliza');  
            $table->double('iva');
            $table->double('prima_total_anual');
            $table->unsignedBigInteger('vehiculo_id');  
            $table->unsignedBigInteger('users_id');  
            $table->bigInteger('estado');  
            $table->timestamps();

            $table->foreign('vehiculo_id')
            ->references('id')->on('vehiculos')
            ->onDelete('set null');

            
            $table->foreign('users_id')
            ->references('id')->on('users')
            ->onDelete('set null');
        });
        Schema::create('poliza_coberturas', function (Blueprint $table) {

            $table->unsignedBigInteger('poliza_id');  
            $table->unsignedBigInteger('cobertura_id');  
            $table->timestamps();

            $table->foreign('poliza_id')
            ->references('id')->on('polizas')
            ->onDelete('set null');

            $table->foreign('cobertura_id')
            ->references('id')->on('coberturas')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polizas');
    }
};
