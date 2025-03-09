<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=SEO 鯨野アイカ - 公式ホームページ />
    <title>@yield('title', '鯨野アイカ - 公式ホームページ')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>

<body>
    <script src="{{ asset('js/script.js') }}"></script>

    @yield('content')
</body>
</html>
