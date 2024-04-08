<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\SchemaState;
use Illuminate\Support\Facades\Schema;
use Laravel\SerializableClosure\UnsignedSerializableClosure;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemones', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre',200);
            $table->integer('Numero');
            $table->float('Altura',50);
            $table->float('Peso',50);
            $table->string('Habilidad');
            $table->integer('Ps');
            $table->integer('Ataque');
            $table->integer('Defensa');
            $table->integer('Velocidad');
            $table->string('imagen',200)->default('default.png');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('sexo_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('debilidad_id');
            $table->timestamps();
        });

        Schema::table('pokemones', function (Blueprint $table){
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('debilidad_id')->references('id')->on('debilidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemones');
    }
};
