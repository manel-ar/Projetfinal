
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('famille', function (Blueprint $table) {
            $table->integer('nom')->change(); 
        });
    }

    public function down(): void
    {
        
    }
};
