<?php
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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Champ auto-increment pour l'ID
            $table->string('firstname'); // Champ pour le prénom
            $table->string('lastname'); // Champ pour le nom de famille
            $table->string('email')->unique(); // Champ pour l'email, doit être unique
            $table->string('phone')->unique(); // Champ pour le numéro de téléphone, doit être unique
            $table->string('password'); // Champ pour le mot de passe
            $table->rememberToken(); // Pour la fonctionnalité "se souvenir de moi"
            $table->timestamps(); // Champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Supprime la table users si elle existe
    }
};
