<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        DB::table('utilisateur')->insert([
            [
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'telephone' => 612345678,
                'adresse' => '10 rue de la Paix, Paris',
                'cni' => 123456789,
                'date_naissance' => '1990-01-01',
                'role' => 'client',
                'photo' => 'path/to/photo1.jpg',
                'password' => bcrypt('password123'), // Assurez-vous de crypter le mot de passe
                'date_creation' => Carbon::now(),
                'date_modification' => Carbon::now(),
                'date_suppression' => now(), // Aucune date de suppression initiale
            ],
            [
                'nom' => 'Martin',
                'prenom' => 'Sophie',
                'telephone' => 612345679,
                'adresse' => '20 avenue des Champs-Élysées, Paris',
                'cni' => 234567890,
                'date_naissance' => '1985-05-15',
                'role' => 'agent',
                'photo' => 'path/to/photo2.jpg',
                'password' => bcrypt('password456'),
                'date_creation' => Carbon::now(),
                'date_modification' => Carbon::now(),
                'date_suppression' => now(),
            ],
            [
                'nom' => 'Bernard',
                'prenom' => 'Luc',
                'telephone' => 612345680,
                'adresse' => '30 boulevard Saint-Germain, Paris',
                'cni' => 345678901,
                'date_naissance' => '1995-12-30',
                'role' => 'distributeur',
                'photo' => 'path/to/photo3.jpg',
                'password' => bcrypt('password789'),
                'date_creation' => Carbon::now(),
                'date_modification' => Carbon::now(),
                'date_suppression' => now(),
            ],
            // Ajoutez d'autres utilisateurs ici si nécessaire
        ]);
    }
}