<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('year_level')->nullable()->after('middle_name'); // e.g., 1st Year, 2nd Year
            $table->string('semester')->nullable()->after('year_level');   // e.g., 1st Semester, 2nd Semester
            $table->string('student_status')->nullable()->after('semester'); // Default status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['year_level', 'semester', 'student_status']); // Correct column names
        });
    }
};
