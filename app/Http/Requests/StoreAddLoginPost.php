<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddLoginPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtEmail'   => "required",
            'txtPass'    => "required"
        ];
    }
    public function messages()
    {
        return [
            'txtEmail.required' => "Bạn chưa nhập Email",
            'txtPass.required'  => "Bạn chưa nhập Mật khẩu",
        ];
    }
}
