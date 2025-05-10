<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donation_claims', function (Blueprint $table) {
            $table->id('claim_id');
            $table->foreignId('donation_id')->constrained('donations', 'donation_id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->dateTime('claim_time');
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donation_claims');
    }
}; 