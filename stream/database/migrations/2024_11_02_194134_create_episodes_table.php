<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('series_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('descriptions');
            $table->integer('season_number');
            $table->integer('episode_number');
            $table->integer('duration');
            $table->string('video_url');
            $table->string('thumbnail_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
