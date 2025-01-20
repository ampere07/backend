<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\SanctumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StudentSocFeeController;
use App\Http\Controllers\StudentDetailsController; 
use App\Http\Controllers\StudentCreationController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\StudentChecklistController;

Route::get('/students/{userId}/checklist', [StudentChecklistController::class, 'show']);
Route::get('/students/on_process_COR', [StudentController::class, 'getStudentsOnProcessCOR']);
Route::post('/students/{id}/assign-subjects', [StudentController::class, 'assignSubjects']); 
Route::post('/students/{id}/update-status', [StudentController::class, 'updateStudentStatus']);
Route::get('/students/{user_id}/cor', [StudentController::class, 'getCOR']);
Route::post('/students/{studentId}/update-section', [StudentController::class, 'updateSection']);



Route::middleware('auth:sanctum')->get('/checklist', [ChecklistController::class, 'index']);

Route::middleware('auth:api')->post('/create-student', [StudentCreationController::class, 'createStudent']);


Route::middleware('auth:sanctum')->get('/student-details', [StudentDetailsController::class, 'getStudentDetails']);
Route::middleware('auth:sanctum')->get('/enrollment-student-details', [StudentController::class, 'fetchEnrollmentStudentDetails']);

Route::get('/student-soc-fees', [StudentSocFeeController::class, 'index']);
Route::post('/student-soc-fees', [StudentSocFeeController::class, 'store']);
Route::get('/student-soc-fees/{id}', [StudentSocFeeController::class, 'show']);
Route::put('/student-soc-fees/{id}', [StudentSocFeeController::class, 'update']);
Route::delete('/student-soc-fees/{id}', [StudentSocFeeController::class, 'destroy']);



Route::post('/notifications', [NotificationController::class, 'store']);
Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead']);
Route::get('/notifications', [NotificationController::class, 'index']);
Route::delete('/notifications/{id}', [NotificationController::class, 'destroy']);


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:api')->group(function () {
    Route::post('/enroll', [StudentController::class, 'enroll']);
});

Route::post('/enrollments/{id}/faculty-approve', [StudentController::class, 'approveByFaculty']); 
Route::post('/enrollments/{id}/faculty-decline', [StudentController::class, 'declineByFaculty']);
Route::get('/students', [StudentController::class, 'getAllStudents']);

Route::post('/students/{id}/decline-payment', [StudentController::class, 'declinePayment']);

Route::get('notifications', [NotificationController::class, 'getAllNotifications']); 

Route::post('/enrollments/{id}/approve', [StudentController::class, 'approveByOfficer']);

Route::get('/enrollments', [StudentController::class, 'getFacultyEnrollments']);


Route::get('/students', [StudentController::class, 'getStudents']);


Route::get('/curriculum', [CurriculumController::class, 'index']);

Route::post('/curriculum', [CurriculumController::class, 'store']);

Route::get('/users', [StudentController::class, 'getUsers']);

Route::middleware('auth:api')->get('/user', [StudentController::class, 'getLoggedInUser']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});




Route::post('/enrollments/{id}/faculty-approve', [StudentController::class, 'approveByFaculty']);
Route::post('/enrollments/{id}/faculty-decline', [StudentController::class, 'declineByFaculty']);
Route::get('/admin/enrollments', [StudentController::class, 'getAdminEnrollments']);

Route::post('/enrollments/{id}/update-status', [StudentController::class, 'updateStudentStatus']);


Route::post('/enrollments/{id}/admin-approve', [StudentController::class, 'approveByAdmin']);
Route::post('/enrollments/{id}/admin-decline', [StudentController::class,'declineByAdmin']);

Route::get('/approved-enrollments', [StudentController::class, 'getApprovedEnrollments']);

Route::middleware('auth:api')->get('/student-status', [StudentController::class, 'getStudentStatus']);



