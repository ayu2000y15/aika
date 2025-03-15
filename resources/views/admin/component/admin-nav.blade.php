<nav class="admin-nav">
    <h1 class="admin-logo">HP管理者画面</h1>
    <ul class="admin-menu">
        <!-- 開発者 または サイト管理者 -->
        @if (session('access_id') == '0' || session('access_id') == '1')
            <li><a href="{{ route('admin.information') }}">お知らせ管理</a></li>
            <li><a href="{{ route('admin.movie') }}">配信動画管理</a></li>
            <li><a href="{{ route('admin.goods') }}">グッズ管理</a></li>
        @endif

        <!-- 開発者のみ -->
        @if (session('access_id') == '0')
            <li><a href="{{ route('admin.photo') }}">HP画像管理</a></li>
            <li><a href="{{ route('admin.definition') }}">汎用テーブル管理</a></li>
        @endif

        <li class="logout"><a href="{{ route('logout') }}">ログアウト</a></li>

        {{-- <li><a href="{{ route('admin.settings') }}">設定</a></li> --}}
    </ul>
</nav>
