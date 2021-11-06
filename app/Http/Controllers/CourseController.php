<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::orderBy('updated_at', 'desc')->get();
        return view('courses.list', compact('courses'));
    }

    public function show($id) {
        $course = Course::find($id);
        // $chapters = Chapter::all()->where('courses_id', $id);
        // dd($chapters);

        return view('courses.details', compact(['course']));
    }

}
