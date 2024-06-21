<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToLigneOrdonnanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ligne_ordonnance', function (Blueprint $table) {
            $table->id()->first(); // Ajouter la colonne id comme première colonne
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ligne_ordonnance', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
}
