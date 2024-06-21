<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneBonLivraisonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_bon_livraison', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_commerc');
            $table->integer('quantite_demandee');
            $table->integer('quantite_livree');
            $table->integer('quantite_restante');
            $table->float('prix_unit');
            $table->float('Montant');
            $table->unsignedBigInteger('id_bls');

            $table->foreign('id_bls')->references('id')->on('bonlivraison_service');
            $table->foreign('id_commerc')->references('id_commerc')->on('nom_commercial');

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
        Schema::dropIfExists('ligne_bon_livraison');
    }
}
