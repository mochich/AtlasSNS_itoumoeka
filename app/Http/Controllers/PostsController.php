<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;

use Validator;


class PostsController extends Controller
{

    public function index()
    {
        // $following_id = Auth::user()->follows()->pluck('following_id');



        $user = Auth::user();
        $posts = Post::get();
        // $posts =
        //     Post::with('user')->whereIn('user_id', $following_id)->latest()->get();

        return view('posts.index', ['user' => $user, 'post' => $posts]);
    }



    public function create(Request $request)
    {


        if ($request->isMethod('post')) {

            $request->validate([
                'post' => 'required|max:150|min:1'
            ]);

            //↓Auth::idは＝で結べばいい。input()は$requestから引抜きイメージ
            $user_id = Auth::id();
            $post = $request->input('post');

            Post::create([
                'post' => $post,
                'user_id' => $user_id,
            ]);

            return redirect('/index');
        }
        return view('posts.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // post更新
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        Post::where('id', $id)->update([
            'post' => $up_post
        ]);
        return redirect('/index');
    }

    // post削除
    public function delete($id)
    {

        Post::where('id', $id)->delete();
        return redirect('/index');
    }
}
