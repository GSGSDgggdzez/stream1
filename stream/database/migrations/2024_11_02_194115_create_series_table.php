<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('descriptions');
            $table->date('release_date');
            $table->string('rate');
            $table->string('thumbnail_url');
            $table->integer('total_seasons');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
