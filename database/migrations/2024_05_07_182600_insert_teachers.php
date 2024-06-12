<?php

use App\Models\Teacher;
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
        $teachers = [
            [
                'name' => 'John Doe',
                'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet felis in urna pretium facilisis ac id neque.',
                'address' => '123 Main Street',
                'phone' => '123456789',
                'profile_image' => 'ruta/a/imagen1.jpg',
                'rating' => 4.5,
                'password' => bcrypt('password1'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Doe',
                'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet felis in urna pretium facilisis ac id neque.',
                'address' => '456 Elm Street',
                'phone' => '987654321',
                'profile_image' => 'ruta/a/imagen2.jpg',
                'rating' => 4.2,
                'password' => bcrypt('password2'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet felis in urna pretium facilisis ac id neque.',
                'address' => '123 Main Street',
                'phone' => '123456789',
                'profile_image' => 'ruta/a/imagen1.jpg',
                'rating' => 4.5,
                'password' => bcrypt('password1'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Doe',
                'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet felis in urna pretium facilisis ac id neque.',
                'address' => '456 Elm Street',
                'phone' => '987654321',
                'profile_image' => 'ruta/a/imagen2.jpg',
                'rating' => 4.2,
                'password' => bcrypt('password2'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Smith',
                'about' => 'Fusce tempor, ex sed vestibulum posuere, felis nisi tempor nisl, non egestas sapien nisl sit amet eros.',
                'address' => '789 Oak Avenue',
                'phone' => '5551234567',
                'profile_image' => 'ruta/a/imagen3.jpg',
                'rating' => 4.7,
                'password' => bcrypt('password3'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emily Johnson',
                'about' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
                'address' => '101 Pine Street',
                'phone' => '5559876543',
                'profile_image' => 'ruta/a/imagen4.jpg',
                'rating' => 4.3,
                'password' => bcrypt('password4'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Christopher Williams',
                'about' => 'Donec vel augue sit amet purus dapibus ultrices. In eget lacus id magna pretium ultricies vitae non lacus.',
                'address' => '321 Maple Drive',
                'phone' => '5554567890',
                'profile_image' => 'ruta/a/imagen5.jpg',
                'rating' => 4.8,
                'password' => bcrypt('password5'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jessica Brown',
                'about' => 'Vivamus hendrerit est vel ligula cursus, nec finibus felis tristique. Proin tempus auctor libero, eget venenatis nulla dignissim eu.',
                'address' => '654 Birch Lane',
                'phone' => '5552345678',
                'profile_image' => 'ruta/a/imagen6.jpg',
                'rating' => 4.4,
                'password' => bcrypt('password6'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Miller',
                'about' => 'Nam ac metus eu dolor volutpat efficitur. Duis ut luctus felis, id convallis purus.',
                'address' => '987 Cedar Street',
                'phone' => '5557890123',
                'profile_image' => 'ruta/a/imagen7.jpg',
                'rating' => 4.6,
                'password' => bcrypt('password7'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emma Wilson',
                'about' => 'Nulla nec elit commodo, suscipit lacus a, commodo nisi. Proin fermentum odio et erat viverra, ac ultrices arcu malesuada.',
                'address' => '234 Pinecrest Drive',
                'phone' => '5553456789',
                'profile_image' => 'ruta/a/imagen8.jpg',
                'rating' => 4.9,
                'password' => bcrypt('password8'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'James Taylor',
                'about' => 'Sed sagittis eros eu leo faucibus, sit amet sollicitudin nunc facilisis. Donec non enim eu mi congue rhoncus.',
                'address' => '456 Elmwood Avenue',
                'phone' => '5559012345',
                'profile_image' => 'ruta/a/imagen9.jpg',
                'rating' => 4.2,
                'password' => bcrypt('password9'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Olivia Anderson',
                'about' => 'Maecenas at velit vitae metus rhoncus efficitur. Sed sit amet tincidunt est. Nullam malesuada ultricies urna.',
                'address' => '789 Elm Street',
                'phone' => '5556789012',
                'profile_image' => 'ruta/a/imagen10.jpg',
                'rating' => 4.7,
                'password' => bcrypt('password10'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Teacher::insert($teachers);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
