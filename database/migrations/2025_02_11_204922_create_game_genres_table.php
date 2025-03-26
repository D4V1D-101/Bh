<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameGenresTable extends Migration
{
    public function up()
    {
        Schema::create('game_genres', function (Blueprint $table) {
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('genre_id');

            $table->primary(['game_id', 'genre_id']);

            $table->foreign('game_id')
                  ->references('id')
                  ->on('games')
                  ->onDelete('cascade');

            $table->foreign('genre_id')
                  ->references('id')
                  ->on('genres')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_genres');
    }
}
