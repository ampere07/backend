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
        $table->string('status')->default('pending')->after('birthdate'); // Adds the column after 'birthdate'
    });
}

public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropColumn('status'); // Allows rollback of the migration
    });
}

};
