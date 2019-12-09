<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddProductPost extends FormRequest
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
                "name" => "required|max:155|unique:products,name",
                "description" => "max:250",
        ];
    }
    public function messages()
    {
        return [
            "name.unique" => "Tên sản phẩm bị trùng",
            "name.max" => "Tên có độ dài không quá 155 kí tự",
            "description.required" => "Bạn phải nhập tên sản phẩm",
            "description.max" => "Mô tả có độ dài không quá 250 kí tự",
        ];
    }
}
