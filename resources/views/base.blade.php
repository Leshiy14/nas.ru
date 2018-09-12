<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="viewport"
                content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>

<<<<<<< HEAD
    {{-- Ïîäêëþ÷àåì partials/bootstrap.blade.php --}}
    @include('partials.bootstrap')

    {{-- Âûâîäèì ñòåê ñî ñòèëÿìè CSS --}}
    @stack('styles')

    {{-- Âûâîäèì ñòåê ñî ñöåíàðèÿìè JavaScript --}}
=======
    {{-- ÐŸÐ¾Ð´ÐºÐ»ÑŽÑ‡Ð°ÐµÐ¼ partials/bootstrap.blade.php --}}
    @include('partials.bootstrap')

    {{-- Ð’Ñ‹Ð²Ð¾Ð´Ð¸Ð¼ ÑÑ‚ÐµÐº ÑÐ¾ ÑÑ‚Ð¸Ð»ÑÐ¼Ð¸ CSS --}}
    @stack('styles')

    {{-- Ð’Ñ‹Ð²Ð¾Ð´Ð¸Ð¼ ÑÑ‚ÐµÐº ÑÐ¾ ÑÑ†ÐµÐ½Ð°Ñ€Ð¸ÑÐ¼Ð¸ JavaScript --}}
>>>>>>> 884b304aaecb5ced8f8a0a66d93eb84964693983
    @stack('scripts')
</head>
<body>
    @yield('main')

    @if (Session::has('message'))
<<<<<<< HEAD
        {{-- Âñïëûâàþùèå ñîîáùåíèÿ. --}}
=======
        {{-- Ð’ÑÐ¿Ð»Ñ‹Ð²Ð°ÑŽÑ‰Ð¸Ðµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ñ. --}}
>>>>>>> 884b304aaecb5ced8f8a0a66d93eb84964693983
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    @if ($errors->count())
<<<<<<< HEAD
        {{-- Ïåðå÷åíü îøèáîê. --}}
=======
        {{-- ÐŸÐµÑ€ÐµÑ‡ÐµÐ½ÑŒ Ð¾ÑˆÐ¸Ð±Ð¾Ðº. --}}
>>>>>>> 884b304aaecb5ced8f8a0a66d93eb84964693983
        <div class="alert alert-danger">
            {{ Html::ul($errors->all()) }}
        </div>
    @endif
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 884b304aaecb5ced8f8a0a66d93eb84964693983
