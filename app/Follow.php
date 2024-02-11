<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model

{

    protected $fillable = [
        'following_id', 'followed_id',
    ];




    // ↓belongの時は単数
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
