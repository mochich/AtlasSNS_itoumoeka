@extends('layouts.login')

@section('content')
<div class="profile-header">
  <div class="profile">
    <img src="{{Storage::url($user->images)}}" alt="" class="icon">

    <dl>
      <div>
        <dt>ユーザー名</dt>
        <dd>{{$user->username}}</dd>
      </div>
      <div>
        <dt>自己紹介</dt>
        <dd>{{$user->bio}}</dd>
      </div>
    </dl>
  </div>
  @if(auth()->user()->isFollowing($user->id))
  <form action="/unfollow" method="post">
    @csrf
    <input type="hidden" name="follower_id" value="{{$user->id}}">
    <button type="submit" class="unfollow-btn">フォロー解除</button>
  </form>
  @else
  <form action="/follow" method="post">
    @csrf
    <input type="hidden" name="follower_id" value="{{$user->id}}">
    <button type="submit" class="follow-btn">フォローする</button>
  </form>
  @endif
</div>

@foreach($posts as $posts)
<article class="post">
  <tr>
    <div class="flex">
      <div class="left">
        <td><img src="{{Storage::url($posts->user->images)}}" class="icon"></td>
      </div>
      <div class="center">
        <td>{{$posts->user->username}}</td>
        <td>{{$posts->post}}</td>
      </div>
      <div class="right">

        <td>{{$posts->created_at}}</td>
      </div>

    </div>
  </tr>
</article>
@endforeach

@endsection
