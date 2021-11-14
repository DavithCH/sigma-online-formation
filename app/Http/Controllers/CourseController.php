<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::orderBy('updated_at', 'desc')->get();
        $categories = Category::all();
        return view('courses.list', compact(['courses', 'categories']));
    }

    public function show($id) {
        $course = Course::find($id);
        $categories = Category::all();
        return view('courses.details', compact(['course','categories']));
    }

    public function add(){
        $categories = Category::all();
        return view('courses.add', compact('categories'));
    }

    public function store(CourseStoreRequest $request) {
        $params = $request->validated();
        $file = Storage::put('public/images', $params['image']);
        $params['image'] = substr($file, 7);
        $course = Course::create($params);


        if(!empty($params['checkboxCategories'])){
            $course->getCategories()->attach($params['checkboxCategories']);
        }

        return redirect()->route('courseList');
    }

    public function edit($id) {
        $course = Course::find($id);
        $categories = Category::all();
        return view('courses.edit', compact(['course','categories']));
    }

    public function update(CourseStoreRequest $request, $id){
        $course = Course::find($id);
        $params = $request->validated();

        $file = Storage::put('public/images', $params['image']);
        $params['image'] = substr($file, 7);
        $course->update($params);
        if(!empty($params['checkboxCategories'])){
            $course->getCategories()->attach($params['checkboxCategories']);
        }

        return redirect()->route('courseDetails', $id);
    }

    public function delete($id) {
        $course = Course::find($id);
        if(Storage::exists("public/$course->image")){
            Storage::delete("public/$course->image");
        }
        $course->delete();
        return redirect()->route('courseList');
    }
}
