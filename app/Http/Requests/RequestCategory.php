<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
            'name' => 'required|min:2|unique:category,name,'.$this->id
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên danh mục này không được để trống (*)',
            'name.min' => 'Tên danh mục phải ít nhất 2 ký tự (*)',
            'name.unique' => 'Tên danh mục này đã tồn tại (*)'
        ];
    }
}
