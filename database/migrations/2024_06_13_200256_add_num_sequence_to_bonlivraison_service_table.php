<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumSequenceToBonLivraisonServiceTable extends Migration
{
    public function up()
    {
        Schema::table('bonlivraison_service', function (Blueprint $table) {
            $table->unsignedInteger('num_sequence')->default(0)->after('id');
        });
    }

    public function down()
    {
        Schema::table('bonlivraison_service', function (Blueprint $table) {
            $table->dropColumn('num_sequence');
        });
    }
}
