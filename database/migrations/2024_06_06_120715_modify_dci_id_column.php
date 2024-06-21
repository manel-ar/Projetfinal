<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dci', function (Blueprint $table) {
            $table->integer('IDdci')->change(); 
        });
    }

    public function down(): void
    {
       
    }
};
