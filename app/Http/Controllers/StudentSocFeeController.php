<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentSocFee;
use Illuminate\Support\Facades\Log;

class StudentSocFeeController extends Controller
{
    public function index()
    {
        return StudentSocFee::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_number' => 'required|string|max:255|unique:students_soc_fees',
            'year_level' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'soc_fee_first_year' => 'required|in:paid,not paid',
            'soc_fee_second_year' => 'required|in:paid,not paid',
            'soc_fee_third_year' => 'required|in:paid,not paid',
            'soc_fee_fourth_year' => 'required|in:paid,not paid',
        ]);

        Log::info('Validated data:', $validatedData);

        try {
            $student = StudentSocFee::create($validatedData);
            return response()->json($student, 201);
        } catch (\Exception $e) {
            Log::error('Error creating student: ' . $e->getMessage());
            return response()->json(['error' => 'Error creating student'], 500);
        }
    }

    public function show($id)
    {
        return StudentSocFee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $student = StudentSocFee::findOrFail($id);

        $validatedData = $request->validate([
            'student_name' => 'sometimes|required|string|max:255',
            'student_number' => 'sometimes|required|string|max:255|unique:students_soc_fees,student_number,' . $id,
            'year_level' => 'sometimes|required|string|max:255',
            'section' => 'sometimes|required|string|max:255',
            'course' => 'sometimes|required|string|max:255',
            'soc_fee_first_year' => 'sometimes|required|in:paid,not paid',
            'soc_fee_second_year' => 'sometimes|required|in:paid,not paid',
            'soc_fee_third_year' => 'sometimes|required|in:paid,not paid',
            'soc_fee_fourth_year' => 'sometimes|required|in:paid,not paid',
        ]);

        Log::info('Validated data for update:', $validatedData);

        try {
            $student->update($validatedData);
            return response()->json($student, 200);
        } catch (\Exception $e) {
            Log::error('Error updating student: ' . $e->getMessage());
            return response()->json(['error' => 'Error updating student'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $student = StudentSocFee::findOrFail($id);
            $student->delete();
            return response()->json(['message' => 'Student deleted successfully.'], 204);
        } catch (\Exception $e) {
            Log::error('Error deleting student: ' . $e->getMessage());
            return response()->json(['error' => 'Error deleting student'], 500);
        }
    }
}
