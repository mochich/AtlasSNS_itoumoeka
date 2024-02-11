@extends('layouts.login')

@section('content')
<img src="{{Storage::url(Auth::user()->images)}}" height="32px" width="32px">
{!! Form::open(['url' => '/post']) !!}
<!-- postリクエストの場合必須↓ -->
{{csrf_field()}}
<div>
  {{ Form::text('post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) }}
</div>

<input type="image" name="" src="{{asset('images/post.png')}}" height="32px" width="32px">

{!! Form::close() !!}

@foreach ($post as $post)
<tr>
  <td>{{$post->user->id}}</td>
  <td><img src="{{Storage::url($post->user->images)}}" height="32px" width="32px"></td>
  <td>{{$post->user->username}}</td>
  <td>{{$post->post}}</td>
  <td>{{$post->created_at}}</td>

  @if (Auth::user()->id == $post->user_id)
  <!--更新ボタン https://atlas-artlif.com/curriculum/7823/-->
  <td><a class="modalOpen" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{asset('images/edit.png')}}" alt="" height="32px" width="32px"></a></td>


  <td>
    <a class="box" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの本を削除してもよろしいでしょうか？')">
      <img src="{{asset('images/trash.png')}}" alt="" height="32px" width="32px"><img src="{{asset('images/trash-h.png')}}" alt="" height="32px" width="32px">

    </a>
  </td>

  @endif
</tr>
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
      <div>
        {{Form::hidden('id','null',['class'=>'modal_id'])}}
        {{ Form::text('upPost',null,['required','class'=>'modal_post'])}}
        {{Form::submit('送信', ['class'=>'modalClose'])}}


      </div>


      {!! Form::close() !!}
    </div>
  </div>

</div>

@endsection
