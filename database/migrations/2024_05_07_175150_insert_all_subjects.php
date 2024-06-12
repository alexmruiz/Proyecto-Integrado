<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Subject;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $subjects = [
            ['name' => 'Matemáticas', 'level' => 'Primero de Primaria'],
            ['name' => 'Lengua y Literatura', 'level' => 'Primero de Primaria'],
            ['name' => 'Ciencias Naturales', 'level' => 'Primero de Primaria'],
            ['name' => 'Ciencias Sociales', 'level' => 'Primero de Primaria'],
            ['name' => 'Educación Física', 'level' => 'Primero de Primaria'],
            ['name' => 'Educación Artística', 'level' => 'Primero de Primaria'],
            ['name' => 'Religión', 'level' => 'Primero de Primaria'], // Si aplica
            ['name' => 'Educación para la Ciudadanía', 'level' => 'Primero de Primaria'], // Si aplica
            ['name' => 'Matemáticas', 'level' => 'Segundo de Primaria'],
            ['name' => 'Lengua y Literatura', 'level' => 'Segundo de Primaria'],
            ['name' => 'Ciencias Naturales', 'level' => 'Segundo de Primaria'],
            ['name' => 'Ciencias Sociales', 'level' => 'Segundo de Primaria'],
            ['name' => 'Educación Física', 'level' => 'Segundo de Primaria'],
            ['name' => 'Educación Artística', 'level' => 'Segundo de Primaria'],
            ['name' => 'Religión', 'level' => 'Segundo de Primaria'], // Si aplica
            ['name' => 'Educación para la Ciudadanía', 'level' => 'Segundo de Primaria'], // Si aplica
            ['name' => 'Matemáticas', 'level' => 'Tercero de Primaria'],
            ['name' => 'Lengua y Literatura', 'level' => 'Tercero de Primaria'],
            ['name' => 'Ciencias Naturales', 'level' => 'Tercero de Primaria'],
            ['name' => 'Ciencias Sociales', 'level' => 'Tercero de Primaria'],
            ['name' => 'Educación Física', 'level' => 'Tercero de Primaria'],
            ['name' => 'Educación Artística', 'level' => 'Tercero de Primaria'],
            ['name' => 'Religión', 'level' => 'Tercero de Primaria'], // Si aplica
            ['name' => 'Educación para la Ciudadanía', 'level' => 'Tercero de Primaria'], // Si aplica
            ['name' => 'Matemáticas', 'level' => 'Cuarto de Primaria'],
            ['name' => 'Lengua y Literatura', 'level' => 'Cuarto de Primaria'],
            ['name' => 'Ciencias Naturales', 'level' => 'Cuarto de Primaria'],
            ['name' => 'Ciencias Sociales', 'level' => 'Cuarto de Primaria'],
            ['name' => 'Educación Física', 'level' => 'Cuarto de Primaria'],
            ['name' => 'Educación Artística', 'level' => 'Cuarto de Primaria'],
            ['name' => 'Religión', 'level' => 'Cuarto de Primaria'], // Si aplica
            ['name' => 'Educación para la Ciudadanía', 'level' => 'Cuarto de Primaria'], // Si aplica
            ['name' => 'Matemáticas', 'level' => 'Quinto de Primaria'],
            ['name' => 'Lengua y Literatura', 'level' => 'Quinto de Primaria'],
            ['name' => 'Ciencias Naturales', 'level' => 'Quinto de Primaria'],
            ['name' => 'Ciencias Sociales', 'level' => 'Quinto de Primaria'],
            ['name' => 'Educación Física', 'level' => 'Quinto de Primaria'],
            ['name' => 'Educación Artística', 'level' => 'Quinto de Primaria'],
            ['name' => 'Religión', 'level' => 'Quinto de Primaria'], // Si aplica
            ['name' => 'Educación para la Ciudadanía', 'level' => 'Quinto de Primaria'], // Si aplica
            ['name' => 'Matemáticas', 'level' => 'Sexto de Primaria'],
            ['name' => 'Lengua y Literatura', 'level' => 'Sexto de Primaria'],
            ['name' => 'Ciencias Naturales', 'level' => 'Sexto de Primaria'],
            ['name' => 'Ciencias Sociales', 'level' => 'Sexto de Primaria'],
            ['name' => 'Educación Física', 'level' => 'Sexto de Primaria'],
            ['name' => 'Educación Artística', 'level' => 'Sexto de Primaria'],
            ['name' => 'Religión', 'level' => 'Sexto de Primaria'], // Si aplica
            ['name' => 'Educación para la Ciudadanía', 'level' => 'Sexto de Primaria'], // Si aplica
            ['name' => 'Matemáticas', 'level' => 'Primero de la ESO'],
            ['name' => 'Lengua y Literatura', 'level' => 'Primero de la ESO'],
            ['name' => 'Ciencias Naturales', 'level' => 'Primero de la ESO'],
            ['name' => 'Geografía e Historia', 'level' => 'Primero de la ESO'],
            ['name' => 'Educación Física', 'level' => 'Primero de la ESO'],
            ['name' => 'Educación Plástica, Visual y Audiovisual', 'level' => 'Primero de la ESO'],
            ['name' => 'Música', 'level' => 'Primero de la ESO'],
            ['name' => 'Tecnología', 'level' => 'Primero de la ESO'],
            ['name' => 'Educación Ético-Cívica', 'level' => 'Primero de la ESO'],
            ['name' => 'Matemáticas', 'level' => 'Segundo de la ESO'],
            ['name' => 'Lengua y Literatura', 'level' => 'Segundo de la ESO'],
            ['name' => 'Ciencias Naturales', 'level' => 'Segundo de la ESO'],
            ['name' => 'Geografía e Historia', 'level' => 'Segundo de la ESO'],
            ['name' => 'Educación Física', 'level' => 'Segundo de la ESO'],
            ['name' => 'Educación Plástica, Visual y Audiovisual', 'level' => 'Segundo de la ESO'],
            ['name' => 'Música', 'level' => 'Segundo de la ESO'],
            ['name' => 'Tecnología', 'level' => 'Segundo de la ESO'],
            ['name' => 'Educación Ético-Cívica', 'level' => 'Segundo de la ESO'],
            ['name' => 'Matemáticas', 'level' => 'Tercero de la ESO'],
            ['name' => 'Lengua y Literatura', 'level' => 'Tercero de la ESO'],
            ['name' => 'Ciencias Naturales', 'level' => 'Tercero de la ESO'],
            ['name' => 'Geografía e Historia', 'level' => 'Tercero de la ESO'],
            ['name' => 'Educación Física', 'level' => 'Tercero de la ESO'],
            ['name' => 'Educación Plástica, Visual y Audiovisual', 'level' => 'Tercero de la ESO'],
            ['name' => 'Música', 'level' => 'Tercero de la ESO'],
            ['name' => 'Tecnología', 'level' => 'Tercero de la ESO'],
            ['name' => 'Educación Ético-Cívica', 'level' => 'Tercero de la ESO'],
            ['name' => 'Matemáticas', 'level' => 'Cuarto de la ESO'],
            ['name' => 'Lengua y Literatura', 'level' => 'Cuarto de la ESO'],
            ['name' => 'Biología y Geología', 'level' => 'Cuarto de la ESO'],
            ['name' => 'Geografía e Historia', 'level' => 'Cuarto de la ESO'],
            ['name' => 'Educación Física', 'level' => 'Cuarto de la ESO'],
            ['name' => 'Educación Plástica, Visual y Audiovisual', 'level' => 'Cuarto de la ESO'],
            ['name' => 'Música', 'level' => 'Cuarto de la ESO'],
            ['name' => 'Tecnología', 'level' => 'Cuarto de la ESO'],
            ['name' => 'Educación Ético-Cívica', 'level' => 'Cuarto de la ESO'],
            ['name' => 'Matemáticas', 'level' => 'Primero de Bachillerato'],
            ['name' => 'Lengua y Literatura', 'level' => 'Primero de Bachillerato'],
            ['name' => 'Biología', 'level' => 'Primero de Bachillerato'],
            ['name' => 'Física', 'level' => 'Primero de Bachillerato'],
            ['name' => 'Química', 'level' => 'Primero de Bachillerato'],
            ['name' => 'Historia del Mundo Contemporáneo', 'level' => 'Primero de Bachillerato'],
            ['name' => 'Filosofía', 'level' => 'Primero de Bachillerato'],
            ['name' => 'Educación Física', 'level' => 'Primero de Bachillerato'],
            ['name' => 'Educación Ético-Cívica', 'level' => 'Primero de Bachillerato'],
            ['name' => 'Matemáticas', 'level' => 'Segundo de Bachillerato'],
            ['name' => 'Lengua y Literatura', 'level' => 'Segundo de Bachillerato'],
            ['name' => 'Biología', 'level' => 'Segundo de Bachillerato'],
            ['name' => 'Física', 'level' => 'Segundo de Bachillerato'],
            ['name' => 'Química', 'level' => 'Segundo de Bachillerato'],
            ['name' => 'Historia de España', 'level' => 'Segundo de Bachillerato'],
            ['name' => 'Historia de la Filosofía', 'level' => 'Segundo de Bachillerato'],
            ['name' => 'Educación Física', 'level' => 'Segundo de Bachillerato'],
            ['name' => 'Educación Ético-Cívica', 'level' => 'Segundo de Bachillerato'],
        ];

        Subject::insert($subjects);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
