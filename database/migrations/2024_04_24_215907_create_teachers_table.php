<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subject');
            $table->text('about');
            $table->string('address');
            $table->string('phone');
            $table->string('profile_image');
            $table->decimal('rating', 3, 1);
            $table->string('password');
            $table->timestamps();
        });

        // Insertar 5 profesores
        DB::table('teachers')->insert([
            [
                'name' => 'Profesor 1',
                'subject' => 'Matemáticas',
                'about' => 'Descripción del Profesor 1',
                'address' => 'Dirección del Profesor 1',
                'phone' => '123456789',
                'profile_image' => 'teacher1.jpg',
                'rating' => 4.5,
                'password' => Hash::make('password1'), // Cifrar la contraseña
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Profesor 2',
                'subject' => 'Historia',
                'about' => 'Descripción del Profesor 2',
                'address' => 'Dirección del Profesor 2',
                'phone' => '987654321',
                'profile_image' => 'teacher2.jpg',
                'rating' => 3.8,
                'password' => Hash::make('password2'), // Cifrar la contraseña
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Profesor 3',
                'subject' => 'Ciencias',
                'about' => 'Descripción del Profesor 3',
                'address' => 'Dirección del Profesor 3',
                'phone' => '567890123',
                'profile_image' => 'teacher3.jpg',
                'rating' => 4.2,
                'password' => Hash::make('password3'), // Cifrar la contraseña
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Profesor 4',
                'subject' => 'Literatura',
                'about' => 'Descripción del Profesor 4',
                'address' => 'Dirección del Profesor 4',
                'phone' => '345678901',
                'profile_image' => 'teacher4.jpg',
                'rating' => 4.0,
                'password' => Hash::make('password4'), // Cifrar la contraseña
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Profesor 5',
                'subject' => 'Arte',
                'about' => 'Descripción del Profesor 5',
                'address' => 'Dirección del Profesor 5',
                'phone' => '901234567',
                'profile_image' => 'teacher5.jpg',
                'rating' => 4.8,
                'password' => Hash::make('password5'), // Cifrar la contraseña
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Mostrar la contraseña del Profesor 5
        $profesor5_password = 'password5';
        echo "Contraseña del Profesor 5: $profesor5_password";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
