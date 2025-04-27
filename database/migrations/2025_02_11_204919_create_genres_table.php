<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 255);
            $table->string('slug', 255);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
