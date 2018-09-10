{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('title', __('Remove status'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP DELETE на веб­‑адрес: products/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($status, [
            'method' => 'DELETE',
            'route'  => [
                'statuses.destroy',
                $status->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}
    {{ $status->name }}

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove status'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
