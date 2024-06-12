<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insertar 10 usuarios
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => 'Usuario ' . ($i + 1),
                'email' => 'usuario' . ($i + 1) . '@example.com',
                'password' => Hash::make('password'), // Cambia 'password' por la contraseña deseada
                'rol' => $i % 2 == 0 ? 'teacher' : 'student', // Alterna entre "teacher" y "student" para cada usuario
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'profile_picture' => 'default_profile_picture.jpg', // Cambia 'default_profile_picture.jpg' por el nombre de la imagen por defecto
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No necesitamos una operación "down" en este caso
    }
};
