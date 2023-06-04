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
        Schema::create('etudiant_declarevirements', function (Blueprint $table) {
            $table->unsignedBigInteger('num_vir');
            $table->string('cne');
            $table->foreign('cne')->references('cne')->on('etudiants')->onDelete('cascade');
            $table->foreign('num_vir')->references('num_vir')->on('declarevirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiant_declarevirements');
    }
};
