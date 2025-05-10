<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('leaderboards', function (Blueprint $table) {
            $table->id('leaderboard_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->integer('total_food_donated');
            $table->integer('rank');
            $table->string('period');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leaderboards');
    }
}; 