<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
            'name1' => 'required|min:2',
            'email1' => 'required|email|unique:user,email,'.$this->id,
            'password1' => 'required|min:6',
            'confirm1' => 'required|min:6|same:password1'
        ];
    }
    public function messages(){
        return [
            'name1.required' => 'Tên của bạn không được để trống (*)',
            'name1.min' => 'Tên của bạn phải trên 2 ký tự (*)',
            'email1.required' => 'Email của bạn không được để trống (*)',
            'email1.email' => 'Email của bạn không hợp lệ (*)', 
            'email1.unique' => 'Email của bạn đã tồn tại (*)', 
            'password1.required' => 'Mật khẩu của bạn không được để trống (*)',
            'password1.min' => 'Mật khẩu của bạn phải được 6 ký tự (*)',
            'confirm1.required' => 'Nhập lại mật khẩu của bạn không được để trống (*)',
            'confirm1.min' => 'Nhập lại mật khẩu của bạn phải được 6 ký tự (*)',
            'confirm1.same' => 'Mật khẩu không khớp (*)',
        ];
    }
}
