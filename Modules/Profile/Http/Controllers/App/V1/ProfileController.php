<?php

namespace Modules\Profile\Http\Controllers\App\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\Profile;

class ProfileController extends Controller
{

    public function index()
    {
        $profile = Profile::latets()->get();
        return response()->json($profile);
    }


    public function create()
    {
        return response()->json($profile);
    }


    public function store(Request $request)
    {
        $profile = Profile::create([
            'username' => $request->input('username'),
            'last_name' => $request->input('last_name')
        ]);
        return response()->json($profile);
    }


    public function show($id)
    {
        $profile = Profile::find($id);
        return response()->json($profile);
    }


    public function edit($id)
    {
        $profile = Profile::findOrfail($id);
        return response()->json($profile);
    }


    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->username = $request->username;
        $profile->last_name = $request->last_name;
        $profile->save();
        return response()->json($profile);
    }


    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return response()->json([
            'message' , 'profile deleted'
        ]);
    }
}
