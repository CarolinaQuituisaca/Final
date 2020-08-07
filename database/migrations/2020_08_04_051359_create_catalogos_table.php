<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('categoria_id');
            $table->string('descripcion')->nullable();
            $table->string('enlace')->nullable();
            $table->date('inicioFact')->nullable();
            $table->date('finFact')->nullable();
            $table->integer('ganancia');
            $table->string('archivo')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogos');
    }
}
