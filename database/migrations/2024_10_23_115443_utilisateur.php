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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nom',50);
            $table->string('prenom', 50);
            $table->integer('telephone')->unique();
            $table->string('adresse',100);
            $table->integer('cni')->unique();
            $table->date('date_naissance');
            $table->enum('role',['agent','client','distributeur']);
            $table->string('photo', 255);
            $table->string('password',255);
            $table->timestamp('date_creation');
            $table->date('date_modification');
            $table->date('date_suppression');
            $table->timestamps();
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
