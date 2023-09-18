<?php

namespace Modules\Question\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Gallery\Entities\Gallery;
use Modules\Question\Entities\question;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = question::latest()->get();
        return response()->json($questions);
    }


    public function create()
    {
        $course_id = Course::latest()->get();
        $image_id = Gallery::latest()->get();
        return response()->json($image_id , $course_id);
    }


    public function store(Request $request)
    {
        $questions = question::create([
            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'level' => $request->input('level'),
            'course_id' => $request->input('course_id'),
            'image_id' => $request->input('image_id'),
        ]);
        return response()->json($questions);
    }


    public function show($id)
    {
        $questions = question::find($id);
        return response()->json($questions);
    }


    public function edit($id)
    {
        $questions = question::findOrFail($id);
        return response()->json($questions);
    }


    public function update(Request $request, $id)
    {
        $questions = question::findOrFail($id);
        $questions->title = $request->input('title');
        $questions->status = $request->input('status');
        $questions->level = $request->input('level');
        $questions->course_id = $request->input('course_id');
        $questions->image_id = $request->input('image_id');
        $questions->save();
        return response()->json($questions);
    }


    public function destroy($id)
    {
        $questions = question::find($id);
        $questions->delete();
        return response()->json(['message' => 'question deleted']);

    }
}
