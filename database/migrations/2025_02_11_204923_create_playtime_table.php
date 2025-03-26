<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaytimeTable extends Migration
{
    public function up()
    {
        Schema::create('playtime', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('game_id');
            $table->integer('playtime_minutes')->default(0);
            $table->timestamp('last_played')->useCurrent();

            $table->unique(['user_id', 'game_id']);

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('game_id')
                  ->references('id')
                  ->on('games')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('playtime');
    }
}
