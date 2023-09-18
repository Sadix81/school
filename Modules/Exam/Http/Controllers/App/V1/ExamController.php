<?php

namespace Modules\Exam\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Exam\Entities\Exam;
use Modules\Grade\Entities\Grade;
use Modules\Student\Entities\Student;

class ExamController extends Controller
{

    public function index()
    {
        $exams = Exam::latest();
        return response()->json($exams);
    }


    public function create()
    {
        $student_id = Student::latest();
        $grade_id = Grade::latest();
        $course_id = Course::latest();
        return response()->json($student_id,$grade_id,$course_id);
    }


    public function store(Request $request)
    {
        $exams = Exam::create([
            'level' => $request->input('level'),
            'count' => $request->input('count'),
            'time' => $request->input('time'),
            'courses' => $request->input('courses'),
            'student_id' => $request->input('student_id'),
            'garde_id' => $request->input('garde_id'),
            'course_id' => $request->input('course_id'),
        ]);
        return response()->json($exams);
    }


    public function show($id)
    {
        $exams = Exam::find($id);
        return response()->json($exams);
    }


    public function edit($id)
    {
        $exams = Exam::findOrFail($id);
        $grade_id = Grade::latest()->get();
        $course_id = Course::latest()->get();
        return response()->json($exams,$grade_id,$course_id);
    }


    public function update(Request $request, $id)
    {
        $exams = Exam::findOrFail($id);
        $exams->level = $request->input('level');
        $exams->count = $request->input('count');
        $exams->time = $request->input('time');
        $exams->courses = $request->input('courses');
        $exams->student_id = $request->input('student_id');
        $exams->garde_id = $request->input('garde_id');
        $exams->course_id = $request->input('course_id');
        $exams->save();
        return response()->json($exams);

    }


    public function destroy($id)
    {
        $exams = Exam::find($id);
        $exams->delete();
        return response()->json([
            'message' , 'exam deleted'
        ]);
    }
}
