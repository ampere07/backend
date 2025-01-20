<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

Route::get('/test', function () {
    try {
        // Check if database is connected
        DB::connection()->getPdo();
        return response()->json(['message' => 'Backend is running and database is connected']);
    } catch (\Exception $e) {
        // Log the error message
        Log::error('Database connection failed: ' . $e->getMessage());

        // Return a response indicating the error
        return response()->json(['message' => 'Backend is running, but database connection failed'], 500);
    }
});