<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('messages');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Aquí podrías recrear la tabla si es necesario
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            // Agrega las columnas de la tabla messages según sea necesario
            $table->timestamps();
        });
    }
}
