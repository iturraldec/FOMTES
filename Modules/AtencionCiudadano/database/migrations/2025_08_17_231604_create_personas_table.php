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
        Schema::create('AtencionCiudadano.personas', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('documento_id', 20)->unique();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('email', 100)->unique()->nullable();
            $table->integer('parroquia_id')->unsigned();
            $table->text('direccion');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parroquia_id')->references('id_parroquia')->on('public.parroquias')->restrictOnDelete()->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('AtencionCiudadano.personas');
    }
};
