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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id() ;
            $table->string('cne')->unique();
            $table->string('nom_e');
            $table->string('prenom_e');
            $table->string('telephone');
            $table->string('adresse');
            $table->date('date_naissance');
            $table->string('urlimg')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('filiere_id');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
