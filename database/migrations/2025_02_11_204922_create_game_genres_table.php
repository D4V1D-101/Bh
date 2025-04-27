<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_genres', function (Blueprint $table) {
            $table->integer('game_id');
            $table->integer('genre_id');

            $table->primary(['game_id', 'genre_id']);
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_genres');
    }
};
