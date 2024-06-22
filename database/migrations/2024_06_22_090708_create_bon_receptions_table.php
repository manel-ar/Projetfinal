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
        Schema::create('bon_receptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_br');
            $table->date('date_reception');
            $table->string('num_livraison')->unique();
            $table->date('date_livraison');
            $table->unsignedBigInteger('id_bcf');
            $table->unsignedBigInteger('id_chef_pharmacien');
            $table->unsignedBigInteger('id_pharmacien');
            $table->foreign('id_bcf')->references('id')->on('bon_commande_fournisseurs')->onDelete('cascade');
            $table->foreign('id_chef_pharmacien')->references('id')->on('chief_pharmacists');
            $table->foreign('id_pharmacien')->references('id')->on('pharmacists');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_receptions');
    }
};
