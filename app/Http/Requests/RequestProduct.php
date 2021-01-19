<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'name' => 'required|min:2|unique:product,name,'.$this->id,
            'content' => 'required',
            'description' => 'required',
            'idcategory' => 'required',
            'idproducttype' => 'required',
            'quantity' => 'required|min:1',
            'price' => 'required|min:1',
            'avatar' => 'required|mimes:jpg,jpeg,png,gif|file|max:5012'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên sản phẩm không được để trống (*)',
            'name.min' => 'Tên sản phẩm phải trên 2 ký tự (*)',
            'name.unique' => 'Tên sản phẩm này đã tồn tại',
            'content.required' => 'Nội dung này không được để trống (*)',
            'description.required' => 'Mô tả này không được để trống (*)',
            'idcategory.required' => 'Danh mục sản phẩm này không được để trống (*)',
            'idproducttype.required' => 'Loại sản phẩm này không được để trống (*)',
            'quantity.required' => 'Số lượng sản phẩm này không được để trống (*)',
            'quantity.min' => 'Số lượng không thể nhỏ hơn 1 (*)',
            'price.required' => 'Giá sản phẩm này không được để trống (*)',
            'price.min' => 'Giá sản phẩm không thể nhỏ hơn 1 (*)',
            'avatar.required' => 'Ảnh đại diện sản phẩm không được để trống (*)',
            'avatar.mimes' => 'Ảnh đại diện sản phẩm không đúng định dạng "jpg, jpeg, png, gif"',
            'avatar.max' => 'Ảnh đại diện sản phẩm tối đa chỉ 5MB'
        ];
    }
}
