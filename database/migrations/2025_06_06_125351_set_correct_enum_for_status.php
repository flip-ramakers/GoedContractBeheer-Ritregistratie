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
        Schema::table('rides', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->enum('status', ['steppedin', 'notsteppedin', 'steppedout'])
                ->nullable();
        });
    }
};
