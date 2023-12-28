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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_code');
            $table->foreignId('course_id')->constrained();
            $table->foreignId('instructor_id')->constrained();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('day');
            $table->integer('units');
            $table->string('school_year');
            $table->integer('semester');
            $table->string('bldg')->nullable();
            $table->string('room')->nullable();
            $table->integer('slots');
            $table->integer('enrollee')->default(0);
            $table->string('offering')->nullable();
            $table->string('course')->nullable();
            $table->boolean('restriction')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
