<?php

namespace App\Http\Controllers;

use App\Models\ChecklistTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChecklistController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Get the logged-in user's ID
        Log::info('Fetching checklist for user ID: ' . $userId); // Debugging log

        // Fetch the checklist data
        $checklist = ChecklistTable::with(['grades.professor', 'curriculum', 'user'])
                                    ->where('usersId', $userId) // Filter by logged-in user ID
                                    ->get();

        if ($checklist->isEmpty()) {
            Log::info('No checklist data found for user ID: ' . $userId); // Debugging log
        } else {
            Log::info('Checklist data found: ', $checklist->toArray()); // Debugging log
        }

        return response()->json($checklist);
    }
}
