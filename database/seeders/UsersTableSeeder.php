<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Jean',
            'lastname' => 'Dupont',
            'email' => 'jean.dupont@example.com',
            'phone' => '0123456789',
            'password' => Hash::make('motdepasse'), // Assure-toi de hacher le mot de passe
        ]);

        // Tu peux ajouter d'autres utilisateurs si nécessaire
        User::create([
            'firstname' => 'Marie',
            'lastname' => 'Curie',
            'email' => 'marie.curie@example.com',
            'phone' => '0987654321',
            'password' => Hash::make('motdepasse'),
        ]);
    }
}
