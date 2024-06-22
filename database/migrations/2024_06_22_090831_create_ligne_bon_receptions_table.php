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
        Schema::create('ligne_bon_receptions', function (Blueprint $table) {
            $table->id();
            $table->string('numero_lot');
            $table->date('date_peremption');
            $table->integer('quantite_recue');
            $table->integer('quantite_restante');
            $table->float('prix_unitaire');
            $table->float('Montant');
            $table->unsignedBigInteger('id_br');
            $table->unsignedBigInteger('id_commerc');
            $table->foreign('id_br')->references('id')->on('bon_receptions')->onDelete('cascade');
            $table->foreign('id_commerc')->references('id_commerc')->on('nom_commercial')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_bon_receptions');
    }
};
