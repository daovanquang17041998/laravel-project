<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductPost extends FormRequest
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
            "txtName" => "required|max:155",
            "txtDescription" => "required|max:250",
        ];
    }
    public function messages()
    {
        return [
            "txtName.max" => "Tên có độ dài không quá 155 kí tự",
            "txtName.required" => "Bạn phải nhập tên sản phẩm",
            "txtDescription.required" => "Bạn phải nhập mô tả",
            "txtDescription.max" => "Mô tả có độ dài không quá 250 kí tự",
        ];
    }
}
