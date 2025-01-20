<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use App\Models\Curriculum;

class CurriculumController extends Controller
{
   // app/Http/Controllers/CurriculumController.php



public function index()
{
    $subjects = Curriculum::all();
    return response()->json($subjects);
}

}