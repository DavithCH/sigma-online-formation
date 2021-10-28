<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::orderBy('updated_at', 'desc')->get();
        return view('courses.list', compact('courses'));
    }


}
