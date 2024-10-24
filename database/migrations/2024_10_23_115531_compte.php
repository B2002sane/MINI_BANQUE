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
        Schema::create('compte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->integer('numeroCompte')->unique;
            $table->integer('solde');
            $table->integer('statut');
            $table->timestamp('date_creation');
            $table->date('date_suppression');
            $table->timestamps();
            $table->foreign('id_users')->references('id')->on('user');

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
