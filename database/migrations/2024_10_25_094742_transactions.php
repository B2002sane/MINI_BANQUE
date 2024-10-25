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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_utilisateur');
            $table->integer('montant');
            $table->enum('type',['depot','retrait','transfert']);
            $table->integer('status');
            $table->integer('frais');
            $table->timestamps();
            $table->foreign('id_utilisateur')->references('id')->on('utilisateur');





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