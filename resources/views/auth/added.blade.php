@extends('layouts.logout')

@section('content')

<section>
  <div class="welcome">
    <p>

      <!-- {{session('key')}} -->
      {{session('username')}}
      さん
    </p>
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</p>
</section>

@endsection
