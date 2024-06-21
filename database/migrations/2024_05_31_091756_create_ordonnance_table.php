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
        Schema::create('ordonnance', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('id_bcs')->nullable();   
            $table->string('nom_patient', 55);  
            $table->string('prenom_patient', 55);  
            $table->integer('age'); 
            $table->date('date'); 
            $table->string('etat');

            $table->timestamps();  

           
            $table->foreign('id_bcs')
                  ->references('id')
                  ->on('bon_commande_service')
                  ->onDelete('cascade');
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('ordonnance');
    }
};
