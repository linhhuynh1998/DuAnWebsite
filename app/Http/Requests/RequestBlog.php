<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBlog extends FormRequest
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
            'name' => 'required|unique:blog,name,'.$this->id,
            'content_blog' => 'required',
            'description' => 'required',
            'avatar' => 'required|mimes:jpg,jpeg,png,gif|max:5012'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Phần này không được để trống (*)',
            'name.unique' => 'Tên blog này đã tồn tại (*)',
            'content_blog.required' => 'Phần này không được để trống (*)',
            'description.required' => 'Phần này không được để trống (*)',
            'avatar.required' => 'Phần này không được để trống (*)',
            'avatar.mimes' => 'Ảnh đại diện sản phẩm không đúng định dạng "jpg, jpeg, png, gif"',
            'avatar.max' => 'Ảnh đại diện sản phẩm tối đa chỉ 5MB'
        ];
    }
}
