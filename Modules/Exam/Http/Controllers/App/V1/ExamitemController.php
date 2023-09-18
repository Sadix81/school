<?php

namespace Modules\Exam\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Exam\Entities\Exam;
use Modules\Exam\Entities\Examitem;

class ExamitemController extends Controller
{
    public function index()
    {
        $examitems = Examitem::latest();
        return response()->json($examitems);
    }


    public function create()
    {
        $examitems = Exam::latest()->get();
        return response()->json($examitems);
    }


    public function store(Request $request)
    {
        $examitems = Examitem::create([
            'question_id' => $request->input('question_id'),
            'item_id' => $request->input('item_id'),
        ]);
        return response()->json($examitems);

    }


    public function show($id)
    {
        $examitems = Examitem::find($id);
        return response()->json($examitems);
    }


    public function edit($id)
    {
        $examitems = Examitem::findOrFail($id);
        return response()->json($examitems);
    }


    public function update(Request $request, $id)
    {
        $examitems = Examitem::findOrFail($id);
        $examitems->question_id = $request->question_id ;
        $examitems->item_id = $request->item_id ;
        $examitems->save();
        return response()->json($examitems);

    }


    public function destroy($id)
    {
        $examitems = Examitem::find($id);
        $examitems->delete();
        return response()->json($examitems);

    }
}
