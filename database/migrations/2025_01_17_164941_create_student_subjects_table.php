<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('subject_1', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('subject_2', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('subject_3', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('subject_4', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('subject_5', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('subject_6', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('subject_7', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('subject_8', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('subject_9', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('subject_10', 255)->collation('utf8mb4_general_ci')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_1')->references('course_code')->on('curriculum')->onDelete('cascade');
            $table->foreign('subject_2')->references('course_code')->on('curriculum')->onDelete('cascade');
            $table->foreign('subject_3')->references('course_code')->on('curriculum')->onDelete('cascade');
            $table->foreign('subject_4')->references('course_code')->on('curriculum')->onDelete('cascade');
            $table->foreign('subject_5')->references('course_code')->on('curriculum')->onDelete('cascade');
            $table->foreign('subject_6')->references('course_code')->on('curriculum')->onDelete('cascade');
            $table->foreign('subject_7')->references('course_code')->on('curriculum')->onDelete('cascade');
            $table->foreign('subject_8')->references('course_code')->on('curriculum')->onDelete('cascade');
            $table->foreign('subject_9')->references('course_code')->on('curriculum')->onDelete('cascade');
            $table->foreign('subject_10')->references('course_code')->on('curriculum')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_subjects');
    }
}



