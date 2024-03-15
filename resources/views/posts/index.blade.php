@extends('layouts.login')

@section('content')
<div>
  <div class="posting">
    <a href="/users/profile"><img class="icon" src="{{Storage::url(Auth::user()->images)}}"></a>
    <div>
      {!! Form::open(['url' => '/post']) !!}
      <!-- postリクエストの場合必須↓ -->
      {{csrf_field()}}
      {{ Form::textarea('post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) }}
    </div>

    <input type="image" name="" src="{{asset('images/post.png')}}" class="icon send">

  </div>
</div>
{!! Form::close() !!}

@foreach ($post as $post)
<article class="post">
  <tr>
    <div class="flex">
      <div class="left">
        <td><a href="/users/{{$post->user->id}}/profile"><img src="{{Storage::url($post->user->images)}}" class="icon"></a></td>
      </div>
      <div class="center">
        <td><span>
            {{$post->user->username}}</span>
        </td>
        <td>
          <div class="post-inn">{!!nl2br ($post->post )!!}</div>
        </td>
      </div>
      <div class="right">
        <td>{{substr($post->created_at,0,16)}}</td>

        @if (Auth::user()->id == $post->user_id)
        <div class="icons">
          <!--更新ボタン https://atlas-artlif.com/curriculum/7823/-->
          <td><a class="modalOpen" href="" post="{!!nl2br ($post->post )!!}" post_id="{{ $post->id }}"><img src="{{asset('images/edit.png')}}" alt="" height="32px" width="32px"></a></td>

          <td>
            <a class="box" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの本を削除してもよろしいでしょうか？')">
              <img src="{{asset('images/trash.png')}}" alt="" height="32px" width="32px"><img src="{{asset('images/trash-h.png')}}" alt="" height="32px" width="32px">
            </a>
          </td>
        </div>

        @endif
      </div>
    </div>
  </tr>
</article>


@endforeach
<!-- 編集のモーダル -->
<div class="modal js-modal"><!-- ① -->

  <div class="modal-inner"><!-- ② -->
    <div class="inner-content">
      {!! Form::open(['url' => '/post/update']) !!}
      <!-- postリクエストの場合必須↓ -->
      {{csrf_field()}}

      <!-- Formファサードの引数
第一引数：name属性の値
第二引数：value属性の値
第三引数：「class」「placeholder」など追加の属性 -->
      <div class="edit">
        {{Form::hidden('id','null',['class'=>'modal_id'])}}
        {{ Form::textarea('post',null,['required','class'=>'modal_post'])}}

        <input type="image" src="{{asset('images/edit.png')}}" alt="" height="32px" width="32px" method="post" href="/post/update">

      </div>


      {!! Form::close() !!}
    </div>
  </div>

</div>

@endsection
