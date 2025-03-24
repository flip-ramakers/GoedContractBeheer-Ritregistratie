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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('daycare_id')->constrained()->onDelete('cascade');
            $table->text('remarks')->nullable();
            $table->enum('status', ['steppedin', 'notsteppedin']);
            $table->timestamp('start')->nullable();
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
