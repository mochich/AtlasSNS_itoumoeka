<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\User;
use App\Follow;
use App\Post;


use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //

    public function followList()
    {
        $users = Auth::user()->followings()->get();
        $followed_id
            = Auth::user()->followings()->pluck('followed_id');

        $posts = Post::with('user')->wherein('user_id', $followed_id)->latest()->get();
        return view('follows.followList', ['users' => $users, 'posts' => $posts]);
    }
    public function followerList()
    {
        $users = Auth::user()->followers()->get();
        $following_id = Auth::user()->followers()->pluck('following_id');

        $posts = Post::with('user')->whereIn('user_id', $following_id)->latest()->get();
        return view('follows.followerList', ['users' => $users, 'posts' => $posts]);
    }

    public function follow(Request $request)
    {
        $userId = Auth::id();
        $followerId = $request->input('follower_id');

        Follow::create([

            'following_id' => $userId,
            'followed_id' => $followerId,
        ]);
        return back();
    }

    public function unfollow(Request $request)
    {
        $userId = Auth::id();
        $followerId = $request->input('follower_id');

        Follow::where(
            'followed_id',
            $followerId
        )->where('following_id', $userId)->delete();

        return back();
    }
}
