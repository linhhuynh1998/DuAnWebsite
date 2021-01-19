<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProductType extends FormRequest
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
            'name' => 'required|min:2|unique:producttype,name,'.$this->id,
            'idcategory' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên loại sản phẩm không được để trống (*)',
            'name.min' => 'Tên loại sản phẩm phải trên 2 ký tự (*)',
            'name.unique' => 'Tên loại sản phẩm này đã tồn tại (*)',
            'idcategory.required' => 'Tên danh mục sản phẩm không được để trống (*)'
        ];
    }
}
