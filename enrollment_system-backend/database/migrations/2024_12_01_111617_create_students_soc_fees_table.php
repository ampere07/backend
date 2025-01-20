<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsSocFeesTable extends Migration
{
    public function up()
    {
        Schema::create('students_soc_fees', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_number')->unique();
            $table->string('year_level');
            $table->string('section');
            $table->string('course');
            $table->enum('soc_fee_first_year', ['paid', 'not paid']);
            $table->enum('soc_fee_second_year', ['paid', 'not paid']);
            $table->enum('soc_fee_third_year', ['paid', 'not paid']);
            $table->enum('soc_fee_fourth_year', ['paid', 'not paid']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students_soc_fees');
    }


};
 