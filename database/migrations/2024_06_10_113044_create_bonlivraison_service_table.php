<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonlivraisonServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonlivraison_service', function (Blueprint $table) {
            $table->id();
            $table->integer('num_bls');
            $table->date('date');
            $table->unsignedBigInteger('id_pharmacien');
            $table->unsignedBigInteger('id_chef');
            $table->unsignedBigInteger('id_bcs');

            $table->foreign('id_pharmacien')->references('id')->on('pharmacists');
            $table->foreign('id_chef')->references('id')->on('chief_pharmacists');
            $table->foreign('id_bcs')->references('id')->on('Bon_commande_service');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonlivraison_service');
    }
}
