<?php

return [

    // Configuration des gardiens d'authentification
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    // Configuration des fournisseurs d'utilisateurs
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\UtilisateurModel::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

    // Définissez 'telephone' comme champ d'identification
    'username' => 'telephone',
];
