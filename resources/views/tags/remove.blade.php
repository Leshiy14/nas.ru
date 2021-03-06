{{-- Это шаблон формы удаления тега из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Edit tag --}}
@section('name', __('Remove tag'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP DELETE на веб‑адрес: tags/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($tag, [
            'method' => 'DELETE',
            'route'  => [
                'tags.destroy',
                $tag->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}
    {{ $tag->name }}

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove tag'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection