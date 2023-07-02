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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('activo');
            $table->timestamps();
            
            $table->foreign('users_id')
            ->references('id')->on('users');
        });
        Schema::create('detalle_bitacoras', function (Blueprint $table) {
            $table->id();
            $table->string('operacion');
            $table->unsignedBigInteger('bitacora_id');
            $table->timestamps();

            $table->foreign('bitacora_id')
            ->references('id')->on('bitacoras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
};
