<?php

namespace Modules\Teacher\Http\Controllers\App\V1;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Teacher\Entities\Teacher;
use Modules\Teacher\Http\Requests\TeacherRequest;
use function redirect;
use function response;
use function view;

class AuthTeacherController extends Controller
{
    public function loginPage()
    {
        return view('admin::layouts.auth.login');
    }

    public function login(TeacherRequest $request)
    {
        $teacher = Teacher::firstOrCreate(['mobile' => $request->mobile,'username' => $request->mobile],
            ['mobile' => $request->mobile,'username' => $request->mobile]);
        $rand = rand(5555,9999);
        $teacher->otps()->create(['code' => $rand]);
        return response()->json([
            'mobile' => $teacher->mobile,
            'code' => $rand
        ], 200);
    }

    public function verify(TeacherRequest $request)
    {
        $code = $request->code;
        $teacher = Teacher::where('mobile',$request->mobile)->whereHas('otps',function ($q) use ($code) {
            $q->where('code',$code);
        })->first();

        if ($teacher) {
            $tokenResult = $teacher->createToken('school');
            $token = $tokenResult->accessToken;
            $token->expires_at = Carbon::now()->addMonth(3);
            $token->save();

            return response()->json([
                'token' => $token->token
            ],200);
        }

        return response()->json([], 404);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.teacher.Logout');
    }

//    public function registerPage()
//    {
//        return view('admin::layouts.auth.register');
//    }
//
//    public function register(TeacherRequest $request)
//    {
//        Teacher::create([
//            'username' => $request->username,
//            'password' => bcrypt($request->password),
//            'mobile' => $request->mobile
//        ]);
//
//        return redirect()->route('auth.student.Register');
//    }
}
