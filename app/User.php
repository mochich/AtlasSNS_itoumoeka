<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




    public function follows()
    {
        return $this->hasMany('App\post');
    }
    public function posts()
    {
        return $this->hasMany('App\post');
    }


    // フォローしているユーザー取得
    public function Followings()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

    // フォローされているユーザー取得
    public function Followers()
    {
        return $this->belongsToMany('App\User', 'follows',  'followed_id', 'following_id');
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }
}
