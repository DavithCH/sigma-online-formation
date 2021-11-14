<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        echo "<script>setTimeout(function(){ window.location.href = 'http://127.0.0.1:8000/courses/list';500 });</script>";
        return view('layouts.layout', compact('categories'));
    }

    public function list(){
        $categories = Category::all();
        return view('categories.list', compact('categories'));
    }

    public function show($id) {
        $courses = Course::join('courses_categories', 'courses.id', '=', 'courses_id')
                            ->where('categories_id', '=', $id)
                            ->get();
        return view('categories.show', compact('courses'));
    }

    public function add(){
        $categories = Category::all();
        return view('categories.add', compact('categories'));
    }

    public function store(CategoryStoreRequest $request){
        $params = $request->validated();
        Category::create($params);

        return redirect()->route('categoryList');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();

        return back();
    }

    public function update($id, CategoryStoreRequest $request){
        $params = $request->validated();
        $category = Category::find($id);
        $category->update($params);
        return back();
    }
}
