@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<section>

  <h2>AtlasSNSへようこそ</h2>
  <ul>
    <li>
      {{ Form::label('e-mail','mail adress') }}
      {{ Form::text('mail',null,['class' => 'input'])}}
    </li>
    <li>
      {{ Form::label('password','password') }}
      {{ Form::password(' password',['class' => 'input']) }}
    </li>
    <li>
      {{ Form::submit('LOGIN',['class' => ' submit ']) }}
    </li>
  </ul>
  <p><a href="/register">新規ユーザーの方はこちら</a></p>


  {!! Form::close() !!}
</section>
@endsection
