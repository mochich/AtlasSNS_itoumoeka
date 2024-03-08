@extends('layouts.login')

@section('content')
<div class="profile-update">
  <img src="{{Storage::url(Auth::user()->images)}}" alt="" class="icon">


  {!! Form::open(['method' => 'put','url' => '/update','enctype'=>'multipart/form-data']) !!}
  <div class="form-group">
    {{csrf_field()}}

    <ul>
      <li>
        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',Auth::user()->username,['required', 'class' => 'input']) }}
      </li>
      <li>
        {{ Form::label('メールアドレス') }}
        {{ Form::text('mail', Auth::user()->mail, ['required', 'class' => 'input']) }}
      </li>
      <li>
        {{ Form::label('パスワード') }}
        {{ Form::password('password', ['required', 'class' => 'input']) }}
      </li>
      <li>
        {{ Form::label('パスワード確認') }}
        {{ Form::password('password_confirmation',['required', 'class' => 'input']) }}
      </li>
      <li>
        {{ Form::label('自己紹介') }}
        {{ Form::text('bio', Auth::user()->bio, ['class' => 'input']) }}
      </li>
      <li>
        {{ Form::label('アイコン画像') }}
        <span>

          {{ Form::input('file','images', Auth::user()->images, ['class' => 'file']) }}


          <p>ファイルを選択</p>
        </span>

      </li>

      <li>
        {{ Form::submit('更新',['class' => 'r-btn'] ) }}
      </li>
    </ul>
  </div>

  {!! Form::close() !!}
</div>

@endsection
