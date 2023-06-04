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
        Schema::create('professeurexternes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_interv');
            $table->foreign('id_interv')->references('id_interv')->on('intervenants')->onDelete('cascade');
            $table->string('nom_inst');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professeurexternes');
    }
};
