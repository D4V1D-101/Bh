<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('playtime', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('user_id');
            $table->integer('game_id');
            $table->integer('playtime_minutes')->default(0);
            $table->timestamp('last_played')->useCurrent();

            $table->unique(['user_id', 'game_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('playtime');
    }
};
