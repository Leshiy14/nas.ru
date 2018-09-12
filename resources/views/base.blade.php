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
    {{-- ���������� partials/bootstrap.blade.php --}}
    @include('partials.bootstrap')

    {{-- ������� ���� �� ������� CSS --}}
    @stack('styles')

    {{-- ������� ���� �� ���������� JavaScript --}}
=======
    {{-- Подключаем partials/bootstrap.blade.php --}}
    @include('partials.bootstrap')

    {{-- Выводим стек со стилями CSS --}}
    @stack('styles')

    {{-- Выводим стек со сценариями JavaScript --}}
>>>>>>> 884b304aaecb5ced8f8a0a66d93eb84964693983
    @stack('scripts')
</head>
<body>
    @yield('main')

    @if (Session::has('message'))
<<<<<<< HEAD
        {{-- ����������� ���������. --}}
=======
        {{-- Всплывающие сообщения. --}}
>>>>>>> 884b304aaecb5ced8f8a0a66d93eb84964693983
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    @if ($errors->count())
<<<<<<< HEAD
        {{-- �������� ������. --}}
=======
        {{-- Перечень ошибок. --}}
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
