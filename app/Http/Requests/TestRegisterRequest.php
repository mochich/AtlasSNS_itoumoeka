<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRegisterRequest extends FormRequest
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
            'username' => 'required|max:12|min:2',
            'mail' => 'required|max:40|min:5|email|unique:users,mail,',
            'password' => 'required|confirmed|max:20|min:8|alpha_num',
            'password_confirmation' => 'min:8|max:20|alpha_num',

        ];
    }


    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [];
    }
}
