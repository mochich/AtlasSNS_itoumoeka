<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['user_id', 'post'];

    // ↓belongの時は単数
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
