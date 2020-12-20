<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-nav mr-auto">
            <h4><a class="navbar-brand">{!! link_to_route('top', 'やんばるエキスパート', [], []) !!}</a></h4>
        </div>
        <div>
            <ul>
                <p>〇〇 ××さん</p>
            </ul>
                <a class="text-dark" href="{{ url('/product_search') }}">商品検索</a>
                <a class="text-dark" href="{{ url('/cart') }}">カート</a>
                <a class="text-dark" href="{{ url('/order_history') }}">注文履歴</a>
                <a class="text-dark">{!! link_to_route('users.show', 'ユーザ情報', ['user' => $user], []) !!}</a>
                <a class="text-dark" href="{{ url('/logout') }}">ログアウト</a>
            </ul>
        </div>
    </nav>
</header>