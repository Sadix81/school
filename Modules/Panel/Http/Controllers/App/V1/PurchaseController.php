<?php

namespace Modules\Panel\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Panel\Entities\Panel;
use Modules\Panel\Entities\Purchase;
use Modules\Student\Entities\Student;

class PurchaseController extends Controller
{

    public function index()
    {
        $purchase = Purchase::latest()->get();
        return response()->json($purchase);
    }


    public function create()
    {
        $panel_id = Panel::latest()->get();
        $student_id = Student::latest()->get();
        return response()->json($panel_id,$student_id);
    }


    public function store(Request $request)
    {
        $purchase = Purchase::create([
            'panel_id' => $request->input('panel_id'),
            'student_id' => $request->input('student_id'),
            'start' => $request->input('start'),
            'end' => $request->input('panel_id'),
        ]);
        return response()->json($purchase);
    }


    public function show($id)
    {
        $purchase = Purchase::find($id);
        return response()->json($purchase);
    }


    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        return response()->json($purchase);
    }


    public function update(Request $request, $id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->panel_id = $request->panel_id;
        $purchase->student_id = $request->student_id;
        $purchase->start = $request->start;
        $purchase->end = $request->panel_id;
        $purchase->save();
        return response()->json($purchase);
    }


    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();
        return response()->json($purchase);

    }
}
