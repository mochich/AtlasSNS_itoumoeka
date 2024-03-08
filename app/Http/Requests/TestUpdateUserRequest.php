<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TestUpdateUserRequest extends FormRequest
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
        $user = Auth::user();
        return [
            'username' => 'required|max:12|min:2',
            'mail' =>
            ['required', 'min:5', 'max:40', 'email', 'unique:users,mail,' . $user->mail . ',mail'],
            'password' => 'required|confirmed|max:20|min:8|alpha_num',
            'password_confirmation' => 'min:8|max:20|alpha_num',
            'bio' => 'max:150',
            'images' => 'image',
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
