<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('content'); // Eliminar la columna 'content' si existe
            $table->foreignId('chat_id')->constrained()->onDelete('cascade'); // Agregar columna 'chat_id'
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Agregar columna 'user_id'
            $table->text('message'); // Agregar columna 'message'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['chat_id']); // Eliminar restricción de clave externa
            $table->dropForeign(['user_id']); // Eliminar restricción de clave externa
            $table->dropColumn(['chat_id', 'user_id', 'message']); // Eliminar columnas agregadas
        });
    }
}

