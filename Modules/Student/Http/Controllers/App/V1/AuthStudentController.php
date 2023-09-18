<?php

namespace Modules\Student\Http\Controllers\App\V1;


use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Otp\Entities\Otp;
use Modules\Student\Entities\Student;
use Modules\Student\Http\Requests\StudentRequest;
use function bcrypt;
use function redirect;
use function response;
use function view;


class AuthStudentController extends Controller
{
    public function loginPage()
    {
        return view('admin::layouts.auth.login');
    }

    public function login(StudentRequest $request)
    {
        $student = Student::firstOrCreate(['mobile' => $request->mobile,'username' => $request->mobile],
            ['mobile' => $request->mobile,'username' => $request->mobile]);
           $rand = rand(5555,9999);
           $student->otps()->create(['code' => $rand]);
        return response()->json([
            'mobile' => $student->mobile,
            'code' => $rand
        ], 200);
    }

    public function verify(StudentRequest $request)
    {
        $code = $request->code;
        $student = Student::where('mobile',$request->mobile)->whereHas('otps',function ($q) use ($code) {
            $q->where('code',$code);
        })->first();

        if ($student) {
            $tokenResult = $student->createToken('school');
            $token = $tokenResult->accessToken;
            $token->expires_at = Carbon::now()->addMonth(3);
            $token->save();

            return response()->json([
                'token' => $token->token
            ],200);
        }

        return response()->json([], 404);

    }

//    public function registerPage()
//    {
//        return view('admin::layouts.auth.register');
//    }
//
//    public function register(StudentRequest $request)
//    {
//        Student::create([
//            'username' => $request->username,
//            'password' => bcrypt($request->password),
//            'mobile' => $request->mobile
//        ]);
//        return redirect()->route(' auth.student.Register');
//    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.student.Logout');
    }
}
