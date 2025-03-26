<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('author', 255);
            $table->string('image', 255)->nullable();
            $table->text('content');

            $table->unsignedBigInteger('game_id');

            $table->timestamps();

            $table->foreign('game_id')
                  ->references('id')
                  ->on('games')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
