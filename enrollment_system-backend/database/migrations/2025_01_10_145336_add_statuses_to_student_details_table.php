<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusesToStudentDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('student_details', function (Blueprint $table) {
            $table->string('student_status')->nullable()->after('course');
            $table->string('enrollment_status')->nullable()->after('student_status');
        });
    }

    public function down()
    {
        Schema::table('student_details', function (Blueprint $table) {
            $table->dropColumn('student_status');
            $table->dropColumn('enrollment_status');
        });
    }
}

