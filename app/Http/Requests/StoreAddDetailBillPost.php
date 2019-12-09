<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddDetailBillPost extends FormRequest
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
                "quantity" => "required|numeric",
        ];
    }
    public function messages()
    {
        return [
            "quantity.required" => "Bạn phải nhập số lượng",
            "quantity.numeric" => "Số lượng phải là số",
        ];
    }
}
