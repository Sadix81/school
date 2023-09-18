<?php

namespace Modules\Panel\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Panel\Entities\Panel;

class PanelController extends Controller
{

    public function index()
    {
        $panel = Panel::latest()->get();
        return response()->json($panel);
    }


    public function create()
    {
        return view('panel::create');
    }


    public function store(Request $request)
    {
        $panel = Panel::create([
           'title' => $request->input('title'),
           'body' => $request->input('body'),
           'price' => $request->input('price')
        ]);
        return response()->json($panel);

    }


    public function show($id)
    {
        $panel = Panel::find($id);
        return response()->json($panel);

    }


    public function edit($id)
    {
        $panel = Panel::findOrFail($id);
        return response()->json($panel);

    }


    public function update(Request $request, $id)
    {
        $panel = Panel::findOrFail($id);
        $panel->title = $request->title;
        $panel->body = $request->body;
        $panel->price = $request->price;
        $panel->save();
        return response()->json($panel);

    }


    public function destroy($id)
    {
        $panel = Panel::find($id);
        $panel->delete();
        return response()->json($panel);

    }
}
