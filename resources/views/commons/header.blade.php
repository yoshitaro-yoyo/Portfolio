<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-nav mr-auto">
            @if (Auth::check())
            <h1><a class="navbar-brand" href="{{ route('home', ['id' => Auth::user()]) }}">やんばるエキスパート</a></h1>
            @else
            <h1><a class="navbar-brand" href="{{ url('/') }}">やんばるエキスパート</a></h1>
            @endif
        </div>

        <div>
            @if (Auth::check())
            <p>{{ !empty(Auth::user()) ? Auth::user()->last_name . Auth::user()->first_name : 'ユーザー' }} さん</p>
            <ul class="navbar-nav">
                <a class="text-dark" href="{{ route('product_search') }}">商品検索</a>
                <a class="text-dark" href="{{ route('cartlist.index') }}">カート</a>
                <a class="text-dark" href="{{ route('orders.index') }}">注文履歴</a>
                <a class="text-dark" href="{{ route('users.show', ['id' => Auth::user()]) }}">ユーザー情報</a>
                <a
                    class="text-dark"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
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
            @endif
        </div>
    </nav>
</header>