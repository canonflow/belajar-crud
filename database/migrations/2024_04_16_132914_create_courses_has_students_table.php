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
        Schema::create('courses_has_students', function (Blueprint $table) {
            $table->foreignId('course_id');
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('lecturer_id');
            $table->foreign('lecturer_id')
                ->references('id')
                ->on('lecturers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('kp', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_has_students');
    }
};
