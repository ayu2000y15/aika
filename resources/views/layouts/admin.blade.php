<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HP管理画面')</title>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
</head>
<body>
    <div class="admin-container">
        <div class="pc-area">
            @include('admin.component.admin-nav')

            <main class="admin-main">
                <div class="admin-container">
                    @if (session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="error-message">{{ session('error') }}</div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
        <div class="no-area">
            <br><br><br>
            <p>スマートフォンでは操作できません。<br>PCで操作してください。</p>
        </div>
    </div>
</body>
</html>
