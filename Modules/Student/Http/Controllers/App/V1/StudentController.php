<?php

namespace Modules\Student\Http\Controllers\App\V1;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use function view;

class StudentController extends Controller
{

    public function index()
    {
        return view('student::index');
    }


    public function create()
    {
        return view('student::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('student::show');
    }


    public function edit($id)
    {
        return view('student::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
