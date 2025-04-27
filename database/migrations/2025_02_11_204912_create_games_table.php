<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 255);
            $table->string('exe_name', 255);
            $table->text('description');
            $table->string('image_path', 255)->nullable();
            $table->dateTime('release_date');
            $table->string('download_link', 255)->nullable();
            $table->string('short_desc', 35)->nullable();
            $table->integer('developer_id');
            $table->integer('publisher_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('developer_id')->references('id')->on('members');
            $table->foreign('publisher_id')->references('id')->on('members');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
