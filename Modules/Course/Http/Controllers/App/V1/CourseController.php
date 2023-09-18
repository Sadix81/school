<?php

namespace Modules\Course\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Grade\Entities\Grade;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::latest();
        return response()->json($courses);
    }


    public function create()
    {
        $grade_id = Grade::latest();
        return response()->json($grade_id);

    }


    public function store(Request $request , $image , $path="public")
    {
        $courses = Course::create([
            'title' => $request->integer('title'),
            'grade_id' => $request->input('grade_id')
        ]);
        try
        {
            $image_name = time() . '-' . $image->getClientOriginalName();
            $file = Storage::putFileAs($path, $image, $image_name);
            $path = $file;
        }
        catch (\Exception $e)
        {
            return null;
        }

        $courses->galleries()->create([
            'image' => $path,
        ]);
        return response()->json($courses);

    }


    public function show($id)
    {
        $courses = Course::find($id);
        return response()->json($courses);
    }


    public function edit($id)
    {
        $courses = Course::findOrFail($id);
        return response()->json($courses);
    }


    public function update(Request $request, $id)
    {
        $courses = Course::findOrFail($id);
        $courses->title = $request->title;
        $courses->grade_id = $request->grade_id;
        $courses->save();
        return response()->json($courses);
    }


    public function destroy($id)
    {
        $courses = Course::find($id);
        $courses->delete();
        return response()->json([
            'message' , 'course delete'
        ]);
    }
}
