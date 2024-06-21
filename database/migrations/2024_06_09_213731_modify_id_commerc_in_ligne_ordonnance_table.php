<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ligne_ordonnance', function (Blueprint $table) {
            // Supprimez la contrainte de clé étrangère existante
            $table->dropForeign(['id_commerc']);
            
            // Modifiez la colonne pour qu'elle ne soit pas nullable
            $table->unsignedBigInteger('id_commerc')->nullable(false)->change();
            
            // Ajoutez de nouveau la contrainte de clé étrangère
            $table->foreign('id_commerc')
                  ->references('id_commerc')
                  ->on('nom_commercial')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    } 
};
