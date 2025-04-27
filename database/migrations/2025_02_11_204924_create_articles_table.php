<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title', 255);
            $table->string('author', 255);
            $table->string('image', 255)->nullable();
            $table->text('content');
            $table->integer('game_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
