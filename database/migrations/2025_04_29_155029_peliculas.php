<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("catalogo", function (Blueprint $table) {
            $table->id();
            $table->string("titulo",250);
            $table->string("descripcion",250);
            $table->string("genero",250);
            $table->string("director",250);
            $table->date("fecha_estreno");
        });
        Schema::create("usuario", function (Blueprint $table) {
            $table->id();
            $table->string("nombre",250);
            $table->string("apellido",250);
            $table->string("usuario",250)->unique();
            $table->string("email",250);
            $table->text("password");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
