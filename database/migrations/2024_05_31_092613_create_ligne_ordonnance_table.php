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
        Schema::create('ligne_ordonnance', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ord');  
            $table->unsignedBigInteger('id_commerc')->nullable();  
            $table->integer('quantite_demandee');  
            $table->string('posologie', 55);  
            $table->string('duree', 55); 
            $table->timestamps();  

            // Foreign key constraints
            $table->foreign('id_ord')
                  ->references('id')
                  ->on('ordonnance')
                  ->onDelete('cascade');

            $table->foreign('id_commerc')
                  ->references('id_commerc')
                  ->on('nom_commercial')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_ordonnance');
    }
};
