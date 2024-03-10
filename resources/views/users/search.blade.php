@extends('layouts.login')

@section('content')

<div class="list-header search-header">
  <form action="/search" method="post">
    @csrf
    <input type="text" name="keyword" class="input" placeholder="ユーザー名">
    <input type="image" name="submit" class="btn btn-success" src="{{asset('images/search.png')}} " height="40px" width="40px">
  </form>
  @if(!empty($keyword))

  <p class="result"><span>検索ワード：{{session('keyword')}}</span></p>
  @endif
</div>

@foreach ($users as $users)
<!-- 自分以外表示 -->
@if ($users->id !== Auth::user()->id)
<div class="search-content">
  <tr>
    <div class="search-list">
      <td><a href="/users/{{$users->id}}/profile"><img src=" {{Storage::url($users->images)}}" class="icon"></a>
      </td>
      <td><span>{{$users->username}}</span></td>
    </div>

    <td>
      @if(auth()->user()->isFollowing($users->id))
      <form action="/unfollow" method="post" class="follow-form">
        @csrf
        <input type="hidden" name="follower_id" value="{{$users->id}}">
        <button class="unfollow-btn">フォロー解除</button>
      </form>
      @else
      <form action="/follow" method="post" class="follow-form">
        @csrf
        <input type="hidden" name="follower_id" value="{{$users->id}}">
        <button class="follow-btn">フォローする</button>
      </form>
      @endif
    </td>
  </tr>
</div>


@endif
@endforeach
@endsection
