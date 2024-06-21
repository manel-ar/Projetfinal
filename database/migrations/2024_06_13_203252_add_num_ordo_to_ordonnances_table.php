<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumOrdoToOrdonnancesTable extends Migration
{
    public function up()
    {
        Schema::table('ordonnance', function (Blueprint $table) {
            $table->integer('num_sequence')->default(0)->after('id');
            $table->string('num_ordo')->unique();
        });
    }

    public function down()
    {
        Schema::table('ordonnance', function (Blueprint $table) {
            $table->dropColumn('num_ordo');
            $table->dropColumn('num_sequence');
        });
    }
}

