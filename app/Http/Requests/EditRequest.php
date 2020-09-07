<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => 'required|string',
	        'tel' => 'required|string'
        ];
    }

    /**
     * 自定義錯誤訊息
     * 
     * @return array
     */
    public function messages(){
        return [
            'required' => '不可為空白',
	 		'string' => '須為字串'
        ];
    }
}
