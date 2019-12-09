<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDetailBillPost extends FormRequest
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
            "txtQuantity" => "required|numeric",
        ];
    }
    public function messages()
    {
        return [
            "txtQuantity.required" => "Bạn phải nhập số lượng",
            "txtQuantity.numeric" => "Số lượng phải là số",
        ];
    }
}
