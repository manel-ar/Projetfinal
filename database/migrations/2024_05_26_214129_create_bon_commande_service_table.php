<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonCommandeServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_commande_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_phar');
            $table->unsignedBigInteger('id_doc');
            $table->unsignedBigInteger('service_id');
            $table->unsignedInteger('num_bc');
            $table->date('date');
            $table->string('etat', 50);
            $table->foreign('id_phar')->references('id')->on('pharmacists');
            $table->foreign('id_doc')->references('id')->on('doctors');
            $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('bon_commande_service');
    }
}
