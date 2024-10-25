<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compte')->insert([
            [
                'id_users' => 1, // Assurez-vous que cet ID existe dans la table 'user'
                'numeroCompte' => 123456789,
                'solde' => 10000,
                'statut' => 1, // 1 pour actif, 0 pour inactif par exemple
                'date_creation' => Carbon::now(),
                'date_suppression' => null,
            ],
            [
                'id_users' => 2,
                'numeroCompte' => 987654321,
                'solde' => 25000,
                'statut' => 1,
                'date_creation' => Carbon::now(),
                'date_suppression' => null,
            ],
            [
                'id_users' => 3,
                'numeroCompte' => 112233445,
                'solde' => 5000,
                'statut' => 0,
                'date_creation' => Carbon::now(),
                'date_suppression' => Carbon::now(), // Indique que le compte est supprimé
            ]
        ]);
    }
}
