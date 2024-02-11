@extends('layouts.login')

@section('content')

<form action="/search" method="post">
  @csrf
  <input type="text" name="keyword" class="form" placeholder="ユーザー名">
  <input type="image" name="submit" class="btn btn-success" src="{{asset('images/search.png')}} " width="30px" height="30px">
</form>

<div>
  <p>検索ワード：{{session('keyword')}}</p>

</div>

@foreach ($users as $users)
<!-- 自分以外表示 -->
@if ($users->id !== Auth::user()->id)
<tr>

  <td><img src="{{Storage::url($users->images)}}" height="32px" width="32px"></td>
  <td>{{$users->username}}</td>

  <td>
    @if(auth()->user()->isFollowing($users->id))
    <form action="/unfollow" method="post">
      @csrf
      <input type="hidden" name="follower_id" value="{{$users->id}}">
      <button type="submit" class="btn">フォロー解除</button>
    </form>
    @else
    <form action="/follow" method="post">
      @csrf
      <input type="hidden" name="follower_id" value="{{$users->id}}">
      <button type="submit" class="btn">フォローする</button>
    </form>
    @endif

  </td>






</tr>
@endif
@endforeach

@endsection
