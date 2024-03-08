<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            // 'mail' =>
            // ['required', 'min:5', 'max:40', 'email', 'unique:users,mail,' . Auth::user()->mail . ',mail'],
            'password' => 'required|confirmed|max:20|min:8|alpha_num',
            'password_confirmation' => 'min:8|max:20|alpha_num',
            'bio' => 'max:150',
            'images' => 'image',
            'post' => 'required|max:150|min:1',
            'upPost' => 'required|max:150|min:1'
        ];
    }


    public function attributes()
    {
        return [
            'username' => 'ユーザー名',
            'mail' => 'メールアドレス',
            'password' => 'パスワード',
            'bio' => '自己紹介',
            'images' => 'ユーザーアイコン',
            'post' => '投稿内容'
        ];
    }

    public function messages()
    {
        return [
            'mail.unique' => '既に存在するメールアドレスです',
            "required" => "必須項目です",
            "email" => "メールアドレスの形式で入力してください",
            "string" => "文字で入力してください",
            "confirmed" => "パスワード確認が一致しません",
        ];
    }
}
