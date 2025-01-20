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
        $table->string('program')->after('middle_name')->nullable(); // Add program after middle_name
    });
}

public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropColumn('program'); // Drop program field
    });
}

};
