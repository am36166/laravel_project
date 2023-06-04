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
        Schema::create('declarevirements', function (Blueprint $table) {
            $table->id('num_vir');
            $table->string('type_vir');
            $table->decimal('montant',8,2);
            $table->string('type_paiement');
            $table->dateTime('date_vir');
            $table->bigInteger('num_facilite')->nullable() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declarevirements');
    }
};
