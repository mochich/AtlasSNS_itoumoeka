<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TestPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;

use Validator;


class PostsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $followed_id
            = Auth::user()->followings()->pluck('followed_id');
        $posts =
            Post::with('user')->wherein('user_id', $followed_id)->orWhere('user_id', Auth::user()->id)->latest()->get();


        return view('posts.index', ['user' => $user, 'post' => $posts]);
    }


    public function followList()
    {
        $users = Auth::user()->followings()->get();
        $followed_id
            = Auth::user()->followings()->pluck('followed_id');

        $posts = Post::with('user')->wherein('user_id', $followed_id)->latest()->get();
        return view('follows.followList', ['users' => $users, 'posts' => $posts]);
    }

    public function create(TestPostRequest $request)
    {


        if ($request->isMethod('post')) {

            // $request->validate([
            //     'post' => 'required|max:150|min:1'
            // ]);

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
    public function update(TestPostRequest $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('post');

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
