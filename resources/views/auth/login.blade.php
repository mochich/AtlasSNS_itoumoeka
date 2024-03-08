@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<section>

  <h2>AtlasSNSへようこそ</h2>
  <ul>
    <li>
      {{ Form::label('e-mail','メールアドレス') }}
      {{ Form::text('mail',null,['required', 'class' => 'input'])}}
    </li>
    <li>
      {{ Form::label('password','パスワード') }}
      {{ Form::password(' password',['required', 'class' => 'input']) }}
    </li>
    <li>
      {{ Form::submit('ログイン',['class' => ' submit ']) }}
    </li>
  </ul>
  <p><a href="/register">新規ユーザーの方はこちら</a></p>


  {!! Form::close() !!}
</section>
@endsection
