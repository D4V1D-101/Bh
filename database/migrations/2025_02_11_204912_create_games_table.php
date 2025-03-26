<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('exe_name', 255);
            $table->text('description');
            $table->string('image_path', 255)->nullable();
            $table->dateTime('release_date');
            $table->string('download_link', 255)->nullable();
            $table->string('short_desc', 35)->nullable();

            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('publisher_id');

            $table->timestamps();

            $table->foreign('developer_id')
                  ->references('id')
                  ->on('members')
                  ->onDelete('cascade');

            $table->foreign('publisher_id')
                  ->references('id')
                  ->on('members')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}
