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
        Schema::create('siniestros', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_siniestro');
            
            $table->string('detalle');
            $table->unsignedBigInteger('vehiculo_id');  
            $table->unsignedBigInteger('users_id');  
            $table->decimal('latitud',10,8);
            $table->decimal('longitud',10,8);
            $table->string('activo');
            $table->bigInteger('estado');  
            $table->timestamps();

            $table->foreign('vehiculo_id')
            ->references('id')->on('vehiculos');

            $table->foreign('users_id')
            ->references('id')->on('users');
        });
        Schema::create('imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siniestro_id');
            $table->string('upload_path');
            $table->string('nombre');
            $table->timestamps();

            $table->foreign('siniestro_id')
            ->references('id')->on('siniestros');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siniestros');
    }
};
