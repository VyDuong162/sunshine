<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiCreateRequest extends FormRequest
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
            'l_ten' => 'required|min:3|max:50|unique:cusc_loai',
            'l_trangthai' => 'required',
        ];
    
    }
    public function messages(){
        return[
            'l_ten.required' => 'Tên loại bắt buộc nhập', 
            'l_ten.min' => 'Tên loại >= 3',
            'l_ten.max' =>'Tên loại < 50',
            'l_ten.unique' => 'Tên đã tồn tại',
            'l_trangthai.required' => 'Chọn trạng thái'
        ];
    }
}
