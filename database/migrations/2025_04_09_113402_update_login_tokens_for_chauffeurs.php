<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('login_tokens', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
    
            $table->foreignId('chauffeur_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
        }); 
    }
    
    public function down()
    {
        Schema::table('login_tokens', function (Blueprint $table) {
            $table->dropForeign(['chauffeur_id']);
            $table->dropColumn('chauffeur_id');
    
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
        });
    }
};
