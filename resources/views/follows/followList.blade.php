@extends('layouts.login')

@section('content')


<div class="list-header">
  <h3>フォローリスト</h3>
  <div class="user-icons">
    @foreach($users as $users)


    <a href="/users/{{$users->id}}/profile"><img src="{{Storage::url($users->images)}}" alt="" class="icon"></a>

    @endforeach
  </div>
</div>
@foreach($posts as $posts)
<article class="post">
  <tr>
    <div class="flex">
      <div class="left">
        <td><a href="/users/{{$posts->user->id}}/profile"><img src="{{Storage::url($posts->user->images)}}" class="icon"></a></td>
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
