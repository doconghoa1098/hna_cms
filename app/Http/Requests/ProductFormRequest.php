<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFormRequest extends FormRequest
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
            'name' =>  'required|regex:/^\w{3,255}$/',
            'code' => [
                'required',
                'regex:/[A-Z0-9]{3,20}$/',
                Rule::unique('products')->ignore($this->product)
            ],
            'price' => 'required|numeric',
            'product_image' => 'required|mimes:jpg,bmp,png,jpeg,gif|max:2048',
            'content'=>'required',
            'maker_id' => 'required|numeric',
            'category' => 'required|array',
        ];
    }
}
