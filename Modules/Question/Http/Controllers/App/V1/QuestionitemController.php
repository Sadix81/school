<?php

namespace Modules\Question\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gallery\Entities\Gallery;
use Modules\Question\Entities\question;
use Modules\Question\Entities\Questionitem;

class QuestionitemController extends Controller
{

    public function index()
    {
        $questionItems = Questionitem::latest()->get();
        return response()->json($questionItems);
    }


    public function create()
    {
        $image_id = Gallery::latest()->get();
        $question_id = question::latest()->get();
        return response()->json($image_id , $question_id);
    }


    public function store(Request $request)
    {
        $questionItems = Questionitem::create([
           'title' => $request->input('title'),
           'correct_answer' => $request->input('correct_answer'),
           'image_id' => $request->input('image_id'),
           'question_id' => $request->input('question_id')
        ]);
        return response()->json($questionItems);

    }


    public function show($id)
    {
        $questionItems = Questionitem::find($id);
        return response()->json($questionItems);

    }


    public function edit($id)
    {
        $questionItems = Questionitem::findOrFail($id);
        return response()->json($questionItems);
    }


    public function update(Request $request, $id)
    {
        $questionItems = Questionitem::findOrFail($id);
        $questionItems->title = $request->title;
        $questionItems->correct_answer = $request->correct_answer;
        $questionItems->image_id = $request->image_id;
        $questionItems->question_id = $request->question_id;
        $questionItems->save();
        return response()->json($questionItems);

    }

    public function destroy($id)
    {
        $questionItems = Questionitem::find($id);
        $questionItems->delete();
        return response()->json(['message' => 'questionItems deleted']);
    }
}
