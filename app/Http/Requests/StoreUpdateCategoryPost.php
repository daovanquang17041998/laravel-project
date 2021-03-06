<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategoryPost extends FormRequest
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
            'name' => 'required|max:155|unique:categories,name',
            'description' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [

            "name.required" => "Bạn chưa nhập category name",
            "name.unique" => "Tên loại đã tồn tại",
            "name.max" => "Tên loại không quá 155 kí tự",
            "description.required" => "Bạn chưa nhập mô tả",
            "description.max" => "Mô tả không quá 255 kí tự",

        ];
    }
}
