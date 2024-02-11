@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->

{!! Form::open(['url' => '/register']) !!}
<section>
  <h2>新規ユーザー登録</h2>
  <ul>
    <li>
      {{ Form::label('ユーザー名','user name') }}
      {{ Form::text('username',null,['class' => 'input']) }}
    </li>

    {{ Form::label('メールアドレス','mail adress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    </li>
    <li>
      {{ Form::label('パスワード','password') }}
      {{ Form::text('password',null,['class' => 'input']) }}
    </li>
    <li>
      {{ Form::label('パスワード確認','pass comfirm') }}
      {{ Form::text('password_confirmation',null,['class' => 'input']) }}
    </li>
    <li>
      {{ Form::submit('REGISTER',['class' => 'submit '] )}}
    </li>
  </ul>
  {!! Form::close() !!}
  <p><a href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</section>

@endsection
