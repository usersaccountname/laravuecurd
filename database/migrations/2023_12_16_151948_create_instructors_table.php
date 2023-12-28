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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('phone')->nullable(); // Make the 'phone' field nullable
            $table->string('email')->default('firstname'.'lastname'.'@example.com'); // Make the 'email' field nullable
            $table->string('password')->default('abcde12345');
            $table->timestamps();
        });
    }
    protected $attributes = [
        'email' => 'example@example.com', // Set a default email value
    ];
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
