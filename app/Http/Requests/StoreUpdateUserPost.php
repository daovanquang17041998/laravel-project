<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserPost extends FormRequest
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
    public function rules($id)
    {
        return [
            'txtFullName' => 'required|max:250',
            'txtEmail'     => "required|email|unique:users,email,".$id,
        ];
    }
    public function messages()
    {
        return [
            'txtFullName.required' => "Bạn chưa nhập tên",
            'txtFullName.max'      => "Tên không quas 250 kí tự",
            'txtEmail.required'     => "Bạn chưa nhập Email",
            'txtEmail.email'        => "Bạn chưa nhập đúng định dạng Email",
            "txtEmail.unique"       => "Email đã tồn tại",
        ];
    }
}
