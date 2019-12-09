<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|max:250',
            'address' => 'required|max:250',
            'password' => 'required|max:12|min:6',
            'repassword'=>'required|same:txtPass|min:6|max:12',
            'phone' => 'required|numeric',
            'birthday' => 'required',
        ];
    }
    public function messages()
    {
        return [
            "email.unique"    => "Email đã tồn tại",
            "email.email"    => "Chưa đúng định dạng email",
            "email.required"    => "Bạn phải nhập email",
            "name.required"    => "Bạn phải nhập tên",
            "name.max"    => "Tên không quá 250 kí tự",
            "name.required"    => "Bạn phải nhập mật khẩu",
            "password.min"    => "Mật khẩu ít nhất 6 kí tự",
            "password.max"    => "Mật khẩu không quá 12 kí tự",
            "repassword.required"    => "Bạn phải nhập lại mật khẩu",
            "repassword.same"    => "Mật khẩu không khớp nhau",
            "repassword.min"    => "Nhập lại mật khẩu ít nhất 6 kí tự",
            "repassword.max"    => "Nhập lại mật khẩu không quá 12 kí tự",
            "phone.required"    => "Bạn phải nhập số điện thoại",
            "phone.numeric"    => "Số điện thoại phải là số",
            "birthday.required"    => "Bạn phải nhập ngày sinh",
            "address.required"    => "Bạn phải nhập địa chỉ",
            "address.max"    => "Địa chỉ không quá 250 kí tự",
        ];
    }
}
