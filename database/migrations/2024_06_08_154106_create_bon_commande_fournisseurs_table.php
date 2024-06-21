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
        Schema::create('bon_commande_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_chef_pharmacien');
            $table->unsignedBigInteger('id_pharmacien');
            $table->unsignedInteger('num_bcf');
            $table->date('date');
            $table->string('nom_fournisseur');
            $table->string('nom_service_contractant');
            $table->string('email_fournisseur')->unique();
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
        Schema::dropIfExists('bon_commande_fournisseurs');
    }
};
