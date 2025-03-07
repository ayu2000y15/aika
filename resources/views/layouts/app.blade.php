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
<style>
    body {
        background-image: url(storage/img/hp/back.png);
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
    }
</style>
<body>
    @yield('content')
</body>
</html>
