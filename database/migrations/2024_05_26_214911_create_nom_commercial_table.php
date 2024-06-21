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
        Schema::create('nom_commercial', function (Blueprint $table) {
            $table->id('id_commerc');
            $table->string('nom_commercial', 255); 
            $table->unsignedBigInteger('id_dci'); 
            $table->foreign('id_dci')->references('id')->on('dci')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nom_commercial');
    }
};
