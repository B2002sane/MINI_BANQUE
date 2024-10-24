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
            $table->id();
            $table->string('nom',50);
            $table->string('prenom', 50);
            $table->integer('telephone')->unique();
            $table->string('adresse',100);
            $table->string('cni', 255)->unique();
            $table->date('date_naissance');
            $table->enum('role',['agent','client','distributeur'])->default('client');
            $table->string('photo', 255);
            $table->string('password',255);
            $table->timestamp('date_creation')->useCurrent();
            $table->date('date_modification')->useCurrent();
            $table->date('date_suppression')->useCurrent();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
