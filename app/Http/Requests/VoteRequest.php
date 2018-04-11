<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteRequest extends FormRequest
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
            'title' => 'required|min:6|max:30',
            'c_name' =>'required|max:30',
            'c_img' => 'required'
        ];
    }

    public function messages()
    {
        return [
        'title.required' => '标题不能为空',
        'title.min' => '标题不能少于6个字',
        'title.max' => '标题不能大于30个字',
        'c_name.required' => '候选者名称不能为空',
        'c_name.max' => '候选者名称不能大于30个字',
        'c_img.required' => '候选者图片不能为空',
      ];
    }
}
