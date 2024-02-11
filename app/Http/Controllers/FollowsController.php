<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;


use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //

    public function followList()
    {
        return view('follows.followList');
    }
    public function followerList()
    {
        return view('follows.followerList');
    }

    public function follow(Request $request)
    {
        $userId = Auth::id();
        $followerId = $request->input('follower_id');

        Follow::create([

            'following_id' => $userId,
            'followed_id' => $followerId,
        ]);
        return redirect('/search');
    }

    public function unfollow(Request $request)
    {
        $userId = Auth::id();
        $followerId = $request->input('follower_id');

        Follow::where(
            'followed_id',
            $followerId
        )->where('following_id', $userId)->delete();

        return redirect('/search');
    }
}
