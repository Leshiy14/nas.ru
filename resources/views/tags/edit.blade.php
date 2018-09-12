{{-- Это шаблон формы редактирования тега в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Edit tag --}}
@section('name', __('Edit tag'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP PUT на веб‑адрес: tags/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($tag, [
            'method' => 'PUT',
            'route'  => [
                'tags.update',
                $tag->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/tags/partials/form.blade.php --}}
    @include('tags.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update tag'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection