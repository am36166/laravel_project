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
        Schema::create('intervenant_filiere', function (Blueprint $table) {
            $table->id('id_modul');
            $table->string('nom_modul');
            $table->unsignedBigInteger('filiere_id');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
            $table->unsignedBigInteger('id_interv');
            $table->foreign('id_interv')->references('id_interv')->on('intervenants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervenant_filiere');
    }
};
