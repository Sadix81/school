<?php

namespace Modules\Gallery\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gallery\Entities\Gallery;
use function view;

class GalleryController extends Controller
{

    public function index()
    {
        $gallery = Gallery::get();
        return response()->json($gallery);
    }


    public function store(Request $request)
    {
        $gallery = Gallery::create([
            'file_path' => $request->image ,
            'image_type' => $request->image_type,
            'image_id' => $request->image_id,
        ]);
        return response()->json($gallery);

    }



    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery::layouts.edit' , compact('gallery'));
    }


    public function update(Request $request, $id)
    {
        $gallery = Gallery::FindOrFail($id);
        $gallery->file_path = $request->file_path != null ? $this->uploadImage($request->file_path) : $gallery->file_path;
        $gallery->save();
        return response()->json($gallery);
    }


    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return response()->json(['message' => 'gallery deleted']);
    }
}
