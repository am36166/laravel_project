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
        Schema::create('rubrique_progremplois', function (Blueprint $table) {
            $table->unsignedBigInteger('num_prog');
            $table->foreign('num_prog')->references('num_prog')->on('progemplois')->onDelete('cascade');
            $table->unsignedBigInteger('id_rub');
            $table->foreign('id_rub')->references('id_rub')->on('rubriques')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rubrique_progremplois');
    }
};
