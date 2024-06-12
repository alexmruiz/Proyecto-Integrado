<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 profesores con contraseñas cifradas
        for ($i = 1; $i <= 10; $i++) {
            // Generar una contraseña aleatoria
            $password = 'password' . $i;

            Teacher::create([
                'name' => 'Profesor ' . $i,
                'subject' => 'Materia ' . $i,
                'about' => 'Descripción del profesor ' . $i,
                'address' => 'Dirección del profesor ' . $i,
                'phone' => '123-456-789' . $i,
                'profile_image' => 'teacher' . $i . '.jpg',
                'password' => bcrypt($password), // Cifrar la contraseña utilizando bcrypt
                'rating' => rand(0, 5), // Calificación aleatoria entre 0 y 5
            ]);

            // Si es el profesor número 5, guardar la contraseña en una variable para visualizarla más adelante
            if ($i === 5) {
                $passwordToShow = $password;
            }
        }

        // Visualizar la contraseña del profesor número 5
        echo "Contraseña del profesor número 5: $passwordToShow";
    }
}
