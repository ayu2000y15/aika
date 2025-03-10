<nav class="admin-nav">
    <h1 class="admin-logo">HP管理者画面</h1>
    <ul class="admin-menu">
        <li><a href="{{ route('admin') }}">ダッシュボード</a></li>
        <li><a href="{{ route('admin.information') }}">お知らせ更新</a></li>
        <li><a href="{{ route('admin.photo') }}">HP画像登録</a></li>
        <li class="logout"><a href="{{ route('logout') }}">ログアウト</a></li>

        {{-- <li><a href="{{ route('admin.settings') }}">設定</a></li> --}}
    </ul>
</nav>
