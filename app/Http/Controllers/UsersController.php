<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;

class UsersController extends Controller
{
    //
    public function profile()
    {
        return view('users.profile');
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
}
