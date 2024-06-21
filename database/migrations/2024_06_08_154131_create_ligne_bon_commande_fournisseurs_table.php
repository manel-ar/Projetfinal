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
        Schema::create('ligne_bon_commande_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bcf'); // Utilisation d'un entier non signé pour l'id_bcs
            $table->unsignedBigInteger('IDdci'); // Utilisation d'un entier non signé pour l'id_commerc
            $table->integer('quantite_commandee');
            $table->integer('quantite_restante')->nullable();
            $table->timestamps();

            $table->foreign('id_bcf')->references('id')->on('bon_commande_fournisseurs')->onDelete('cascade');
            $table->foreign('IDdci')->references('id')->on('dci')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_bon_commande_fournisseurs');
    }
};
