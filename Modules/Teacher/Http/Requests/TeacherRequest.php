<?php

namespace Modules\Teacher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    public function rules()
    {
        return [
//            'username' => 'required|string|max:255',
//            'password' => 'required|max:255',
//            'mobile' => 'required|digits|max:11|min:11',
        ];
    }


    public function messages()
    {
        return [
            'username.required' => 'وارد کردن نام الزامیست',
            'username.string' => 'نام باید بصورت حروف وارد شود',
            'username.max' => 'تعدا کارکتر های مجاز 255 کارکتر است',
            'password.required' => 'وارد کردن رمز عبور الزامیست',
            'password.max' => 'کارکتر های رمزعبور باید 255 کارکتر باشد',
            'mobile.required' => 'وارد کردن شماره تماس الزامیست',
            'mobile.digits' => 'شماره تماس باید بصورت رقم باشد',
            'mobile.max' => 'شماره تماس 11 رقمی وارد کنید',
            'mobile.min' => 'شماره تماس 11 رقمی وارد کنید',
        ];
    }
}
