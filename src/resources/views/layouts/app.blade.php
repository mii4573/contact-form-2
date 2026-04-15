<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionably Late</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>

<body>
   <header class="header">
    <div class="header__inner">
        <a class="header__logo" href="/">
            Fashionably Late
        </a>

        <nav class="header__nav">
            @if (Request::is('login'))
                <a class="header__nav-button-link" href="/register">register</a>
            @elseif (Request::is('admin'))
                <form class="form" action="/logout" method="post">
                   @csrf
                   <button class="header__nav-button-submit" type="submit">logout</button>
                </form>
            @else
                <a class="header__nav-button-link" href="/login">login</a>
            @endif
        </nav>
    </div>
</header>

<main>
 @yield('content')
</main>
</body>
</html>