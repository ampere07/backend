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
    Schema::table('payments', function (Blueprint $table) {
        // Manually rename the column using DB::statement
        DB::statement('ALTER TABLE payments CHANGE COLUMN status payment_status ENUM("pending", "approved", "declined") NOT NULL');
    });
}

public function down()
{
    Schema::table('payments', function (Blueprint $table) {
        // Revert back to the original column name if needed
        DB::statement('ALTER TABLE payments CHANGE COLUMN payment_status status ENUM("pending", "approved", "declined") NOT NULL');
    });
}


};
