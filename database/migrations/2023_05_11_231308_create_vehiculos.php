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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');         
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->string('placa')->unique();
            $table->string('combustible');
            $table->bigInteger('potencia'); 
            $table->double('altura'); 
            $table->double('anchura'); 
            $table->bigInteger('nro_asiento');  
            $table->string('descripcion'); 
            $table->string('imagen'); 
            $table->bigInteger('estado');        
            $table->timestamps();

            $table->foreign('users_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('vehiculos');
    }
};
