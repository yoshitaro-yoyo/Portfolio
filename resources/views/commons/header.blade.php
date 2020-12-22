<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-nav mr-auto">
            <h1><a class="navbar-brand" href="{{ url('/') }}">やんばるエキスパート</a></h1>
        </div>
        <div>
        @if (Auth::check())
            <p>{{ !empty(Auth::user()) ? Auth::user()->last_name . Auth::user()->first_name : 'ユーザー' }} さん</p>
                <ul class="navbar-nav">
                    <a class="text-dark" href="{{ url('/product_search') }}">商品検索</a>
                    <a class="text-dark" href="{{ url('/cart') }}">カート</a>
                    <a class="text-dark" href="{{ url('/order_history') }}">注文履歴</a>
                    <a class="text-dark" href="{{ url('/user_info') }}">ユーザ情報</a>
                    <a class="text-dark" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </ul>
        @else
                <ul>
                    <li>
                        <a class="text-dark" href="{{ url('/login') }}"> ログイン </a>
                        <a class="text-dark" href="{{ url('/register') }}"> 新規登録 </a>
                    </li>
                </ul>
        </div>
    </nav>
    @endif
</header>