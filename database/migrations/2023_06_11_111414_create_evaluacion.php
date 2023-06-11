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
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');            
            $table->string('descripcion');
            $table->string('monto');
            $table->unsignedBigInteger('users_id'); 
            $table->unsignedBigInteger('siniestro_id'); 
            $table->timestamps();

            $table->foreign('users_id')
            ->references('id')->on('users');

            $table->foreign('siniestro_id')
            ->references('id')->on('siniestros');
        });

        Schema::create('detalles', function (Blueprint $table) {
            $table->id();          
            $table->string('detalle');
            $table->float('costo');
            $table->unsignedBigInteger('evaluacion_id'); 
            $table->timestamps();

            $table->foreign('evaluacion_id')
            ->references('id')->on('evaluacions');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacions');
    }
};
