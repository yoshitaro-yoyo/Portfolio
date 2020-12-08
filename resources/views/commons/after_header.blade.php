<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-nav mr-auto">
            <h1><a class="navbar-brand" href="{{ url('/') }}">やんばるエキスパート</a></h1>
        </div>
        <div>
            <ul>
                <p>〇〇 ××さん</p>
            </ul>
            <ul class="navbar-nav">
                <a class="text-dark" href="{{ url('/product_search') }}">商品検索</a>
                <a class="text-dark" href="{{ url('/cart') }}">カート</a>
                <a class="text-dark" href="{{ url('/order_history') }}">注文履歴</a>
                <a class="text-dark" href="{{ url('/user_info') }}">ユーザ情報</a>
                <a class="text-dark" href="{{ url('/logout') }}">ログアウト</a>
            </ul>
        </div>
    </nav>
</header>