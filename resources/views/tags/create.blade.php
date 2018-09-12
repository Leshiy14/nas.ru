{{-- Это шаблон формы добавления тега в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Create tag --}}
@section('name', __('Create tag'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP POST на маршрут .create --}}
    {{
        Form::model($tag, [
            'method' => 'POST',
            'route'  => 'tags.store'
        ])
    }}

    {{-- Включаем шаблон resources/views/tags/partials/form.blade.php --}}
    @include('tags.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save tag'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection