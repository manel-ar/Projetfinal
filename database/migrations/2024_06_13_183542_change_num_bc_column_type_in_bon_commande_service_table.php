<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNumBcColumnTypeInBonCommandeServiceTable extends Migration
{
    public function up()
    {
        Schema::table('bon_commande_service', function (Blueprint $table) {
            $table->string('num_bc')->change(); // Modifier la colonne num_bc pour accepter les chaînes de caractères
        });
    }

    public function down()
    {
        Schema::table('bon_commande_service', function (Blueprint $table) {
            $table->integer('num_bc')->change(); // Revenir à l'ancien type de colonne si nécessaire
        });
    }
}
