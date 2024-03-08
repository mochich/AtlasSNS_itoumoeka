@extends('layouts.logout')

@section('content')
<div class="alert">
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</div>

<!-- 適切なURLを入力してください -->

{!! Form::open(['url' => '/register']) !!}
<section>
  <h2>新規ユーザー登録</h2>
  <ul class="register_list">
    <li>
      {{ Form::label('ユーザー名') }}
      {{ Form::text('username',null,['class' => 'input']) }}
    </li>
    <li>
      {{ Form::label('メールアドレス') }}
      {{ Form::text('mail',null,['class' => 'input']) }}
    </li>
    <li>
      {{ Form::label('パスワード') }}
      {{ Form::password('password',null,['class' => 'input']) }}
    </li>
    <li>
      {{ Form::label('パスワード確認') }}
      {{ Form::password('password_confirmation',null,['class' => 'input']) }}
    </li>
    <li>
      {{ Form::submit('新規登録',['class' => 'submit '] )}}
    </li>
  </ul>
  {!! Form::close() !!}
  <p><a href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</section>

@endsection
