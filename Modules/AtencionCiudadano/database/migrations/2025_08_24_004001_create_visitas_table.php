<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('AtencionCiudadano.visitas', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('persona_id');
            $table->smallInteger('sitio_id');
            $table->text('observaciones')->nullable(true)->default(null);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('persona_id')->references('id')->on('AtencionCiudadano.personas')->restrictOnDelete()->onUpdate('cascade');
            $table->foreign('sitio_id')->references('id')->on('AtencionCiudadano.sitios')->restrictOnDelete()->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('AtencionCiudadano.visitas');
    }
};
