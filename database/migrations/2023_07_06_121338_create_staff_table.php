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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name', 120);
            $table->string('middle_name')->nullable();
            $table->string('last_name', 120);
            $table->string('address', 255);
            $table->string('city', 32);
            $table->string('post_code', 12);
            $table->string('phone', 16);
            $table->string('title');
            $table->string('email');
            $table->date('dob');
            $table->enum('gender', [ 'f', 'm', 'o'])->nullable();
            $table->enum('marital_status', [ 's', 'm', 'w', 'd'])->nullable();
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
