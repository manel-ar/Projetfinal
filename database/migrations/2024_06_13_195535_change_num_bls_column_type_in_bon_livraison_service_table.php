<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNumBlsColumnTypeInBonLivraisonServiceTable extends Migration
{
    public function up()
    {
        Schema::table('bonlivraison_service', function (Blueprint $table) {
            $table->string('num_bls')->change();
        });
    }

    public function down()
    {
        Schema::table('bonlivraison_service
        ', function (Blueprint $table) {
            $table->integer('num_bls')->change();
        });
    }
}
