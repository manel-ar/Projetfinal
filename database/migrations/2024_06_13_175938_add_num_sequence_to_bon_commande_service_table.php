<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumSequenceToBonCommandeServiceTable extends Migration
{
    public function up()
    {
        Schema::table('bon_commande_service', function (Blueprint $table) {
            $table->unsignedInteger('num_sequence')->default(0)->after('id');
        });
    }

    public function down()
    {
        Schema::table('bon_commande_service', function (Blueprint $table) {
            $table->dropColumn('num_sequence');
        });
    }
}
