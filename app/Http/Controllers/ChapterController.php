<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterStoreRequest;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(){
        $chapters = Chapter::all();
        return view('chapters.list', compact('chapters'));
    }

    public function add($course) {
        return view('chapters.add', compact('course'));
    }

    public function store(ChapterStoreRequest $request, $course){
        $params = $request->validated();
        Chapter::create([
            "courses_id" => $course,
            "title" => $params['title'],
            "duration" => $params['duration'],
            "content" => $params['content'],
            "number"=> $params["number"],
        ]);
        return redirect()->route('courseDetails',$course);
    }

    public function delete($id){
        $chapter = Chapter::find($id);
        $chapter->delete();
        return back();
    }

    public function edit($id, $course) {
        $chapter = Chapter::find($id);
        return view('chapters.edit', compact(['chapter', 'course']));
    }

    public function update($id, ChapterStoreRequest $request, $course){
        $params = $request->validated();
        $chapter = Chapter::find($id);

        $chapter->update([
            "courses_id" => $course,
            "title" => $params['title'],
            "duration" => $params['duration'],
            "content" => $params['content'],
            "number"=> $params["number"],
        ]);
        return redirect()->route('courseDetails',$course);
    }
}
