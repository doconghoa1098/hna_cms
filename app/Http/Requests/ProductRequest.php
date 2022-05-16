<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
                Rule::unique('products')->ignore($this->id)
            ],
            'price' => 'required|numeric',
            'product_image' => 'required|mimes:jpg,bmp,png,jpeg,gif|max:2048',
            'content'=>'required',
            'maker_id' => 'required|numeric',
            'category' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'username.regex' => 'Tên sản phẩm từ 3 đến 255 ký tự gồm chữ và số',
            'code.required' => 'Mã sản phẩm không được để trống',
            'code.unique' => 'Mã sản phẩm đã tồn tại',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Kiểu dữ liệu sai',
            'product_image.required' => 'Ảnh sản phẩm không được để trống',
            'product_image.mimes' => 'Định dạng ảnh không hỗ trợ',
            'product_image.max' => 'Kích thước ảnh quá lớn',
            'content.required' => 'Mô tả sản phẩm',
            'maker_id.required' => 'Chọn nhà sản xuất',
            'maker_id.numeric' => 'Kiểu dữ liệu sai',
            'category.required' => 'Chọn danh mục sản phẩm',
            'category.array' => 'Kiểu dữ liệu sai',
        ];
    }
}
