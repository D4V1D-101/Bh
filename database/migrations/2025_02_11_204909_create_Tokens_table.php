<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{

    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->boolean('device');
            $table->foreignId('user_id')->constrained('users');
            $table->string('token', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('expiry_date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
