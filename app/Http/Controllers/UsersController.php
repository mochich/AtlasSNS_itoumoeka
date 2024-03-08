<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TestUpdateUserRequest;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    //
    public function profile($id)
    {
        $user = User::where('id', $id)->first();
        $posts = Post::where('user_id', $id)->latest()->get();
        return view('users.profile', ['user' => $user, 'posts' => $posts]);
    }


    public function search(Request $request)
    {

        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if (!empty($keyword)) {
            $users = User::where('username', 'like', '%' . $keyword . '%')->get();

            // $request->session()->put('key', 値);
            $request->session()->put('keyword',  $keyword);
            $request = session()->get('keyword');
        } else {
            $users = User::all();
        }

        // 3つ目の処理
        return view('users.search', ['users' => $users, 'keyword' => $keyword]);
    }

    public function updateForm()
    {
        $user = Auth::user();
        return view('users.profile_update', ['user' => $user]);
    }

    public function update(TestUpdateUserRequest $request)
    {
        // dd($request);
        if ($request->isMethod('put')) {


            // $request->validate([
            //     'username' => 'required|max:12|min:2',
            //     'mail' =>
            //     ['required', 'min:5', 'max:40', 'email', Rule::unique('users')->ignore(Auth::id())],
            //     'password' => 'required|confirmed|max:20|min:8|alpha_num',
            //     'password_confirmation' => 'min:8|max:20|alpha_num',
            //     'bio' => 'string|max:150',
            //     'images' => 'image',
            // ]);

            $user = Auth::user();
            // 画像登録
            $image = $request->file('images')->store('public');
            $user->update([
                'username' => $request->input('username'),
                'mail' => $request->input('mail'),
                'password' => bcrypt($request->input('password')),
                'bio' => $request->input('bio'),
                'images' => basename($image),
            ]);
            return redirect('index');
        }
        return view('users.profile_update');
    }
}
