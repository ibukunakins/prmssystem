<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('title', ['Mr', 'Miss', 'Mrs', 'Master']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('city', 32);
            $table->string('post_code', 12);
            $table->date('dob');
            $table->string('contact_name', 120);
            $table->string('contact_phone', 14);
            $table->enum('marital_status', ['m', 's', 'd', 'w']);
            $table->enum('gender', [ 'f', 'm', 'o'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
