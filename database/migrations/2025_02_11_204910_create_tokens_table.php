<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->tinyInteger('device');
            $table->integer('user_id');
            $table->string('token', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('expiry_date');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};
