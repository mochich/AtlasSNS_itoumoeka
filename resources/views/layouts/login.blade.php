<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />


    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{asset('js/login.js')}}"></script>

</head>

<body>
    <header>
        <div id="head">
            <h1><a href='/index'><img src="{{asset('images/atlas.png')}}" height="50px"></a></h1>

            <div class="user_nav">
                <p class="username">{{ Auth::user()->username }}さん</p>
                <button type="button" class="arrow_btn"><span class="inn"></span></button>
                <a href="/users/profile"><img src="{{Storage::url(Auth::user()->images)}}" class="icon"></a>

                <nav class="menu">
                    <ul>
                        </p>
                        </p>
                        <li>
                            <a href="/index">
                                <p>HOME</p>
                            </a>

                        </li>
                        <li>
                            <a href="/users/profile">
                                <p>プロフィール編集</p>
                            </a>

                        </li>
                        <li>
                            <a href="/logout">
                                <p>ログアウト</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>

    </header>
    <div id="row">
        <div id="container">
            <div class="alert">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </div>
            @yield('content')

        </div>

        <div id="side-bar">

            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>

                <p>フォロー数　　　

                    {{DB::table('follows')->where('following_id', Auth::id())->count()}}

                    名
                </p>

                <p class="btn"><a href="/followList">フォローリスト</a></p>

                <p>フォロワー数　　
                    <!-- Follow::where('following_id', Auth::id())->count() -->
                    {{DB::table('follows')->where('followed_id', Auth::id())->count()}}
                    名
                </p>


                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <div class="btn btn_search"><a href="/search">ユーザー検索</a></div>

        </div>
    </div>

    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>

</html>
