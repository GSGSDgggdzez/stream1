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
        Schema::create('viewing_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained();
            $table->foreignId('movie_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('series_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('episode_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewing_histories');
    }
};
