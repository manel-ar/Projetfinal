<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bonlivraison_service', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ordonnance')->nullable()->after('id_bcs');
            $table->foreign('id_ordonnance')->references('id')->on('ordonnance')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('bonlivraison_service', function (Blueprint $table) {
            $table->dropForeign(['id_ordonnance']);
            $table->dropColumn('id_ordonnance');
        });
    }
};
