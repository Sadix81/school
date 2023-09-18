<?php

namespace Modules\Grade\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Grade\Entities\Grade;


class GradeController extends Controller
{

    public function index()
    {
        $grades = Grade::latest()->get();
        return response()->json($grades);
    }

    public function create()
    {
        return view('grade::layouts.create');
    }

    public function store(Request $request)
    {
        $grade = Grade::create([
            'title' => $request->input('title')
        ]);

        return response()->json($grade);
    }

    public function show($id)
    {
        $grade = Grade::find($id);
        return response()->json($grade);
    }

    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return response()->json($grade);
    }

    public function update(Request $request, $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->title = $request->input('title');
        $grade->save();
        return response()->json($grade);
    }

    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        return response()->json(['message' => 'Grade deleted']);
    }
}
