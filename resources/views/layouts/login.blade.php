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
            <h1><a><img src="{{asset('images/atlas.png')}}" href='/top' height="50px"></a></h1>
            <div>
                <div class="user_nav">
                    <p>{{ Auth::user()->username }}さん</p>
                    <button type="button" class="arrow_btn"><span class="inn"></span></button>
                    <img src="{{Storage::url(Auth::user()->images)}}">

                    <nav class="menu">
                        <ul>
                            </p>
                            </p>
                            <li>
                                <p><a href="/index">HOME</a></p>
                                </p>
                                </p>
                            </li>
                            <li>
                                <p><a href="/profile">プロフィール編集</a></p>
                                </p>
                            </li>
                            <li>
                                <p><a href="/logout">ログアウト</a></p>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>
    <div id="row">
        <div id="container">
            @yield('content')

        </div>
        <div id="side-bar">

            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                    <p>フォロー数</p>
                    {{DB::table('follows')->where('following_id', Auth::id())->count()}}
                    <p>
                        名
                    </p>
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>
                <div>
                    <p>フォロワー数</p>
                    <p><!-- Follow::where('following_id', Auth::id())->count() -->
                        {{DB::table('follows')->where('followed_id', Auth::id())->count()}}
                        名
                    </p>
                </div>

                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>

        </div>
    </div>

    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>

</html>
