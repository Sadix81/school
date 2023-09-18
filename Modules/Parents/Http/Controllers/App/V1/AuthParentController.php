<?php

namespace Modules\Parents\Http\Controllers\App\V1;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Parents\Entities\Parents;
use Modules\Parents\Http\Requests\ParentsRequest;
use Modules\Student\Entities\Student;


class AuthParentController extends Controller
{
    public function loginPage()
    {
        return view('admin::layouts.auth.login');
    }

    public function login(ParentsRequest $request)
    {
        $parents = Parents::firstOrCreate(['mobile' => $request->mobile,'username' => $request->mobile],
            ['mobile' => $request->mobile,'username' => $request->mobile]);
        $rand = rand(5555,9999);
        $parents->otps()->create(['code' => $rand]);
        return response()->json([
            'mobile' => $parents->mobile,
            'code' => $rand
        ], 200);
    }
    public function verify(ParentsRequest $request)
    {
        $code = $request->code;
        $parents = Parents::where('mobile',$request->mobile)->whereHas('otps',function ($q) use ($code) {
            $q->where('code',$code);
        })->first();

        if ($parents) {
            $tokenResult = $parents->createToken('school');
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
        return redirect()->route('auth.parents.Logout');
    }

//    public function registerPage()
//    {
//        return view('admin::layouts.auth.register');
//    }
//
//    public function register(ParentsRequest $request)
//    {
//        Student::create([
//            'username' => $request->username,
//            'password' => bcrypt($request->password),
//            'mobile' => $request->mobile
//        ]);
//
//        return redirect()->route('auth.parents.Register');
//    }
}
