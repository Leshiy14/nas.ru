{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('name', __('Edit product'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP PUT на веб‑адрес: products/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($product, [
            'method' => 'PUT',
            'route'  => [
                'products.update',
                $product->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/products/partials/form.blade.php --}}
    @include('products.partials.form')
{{-- В секции name родительского шаблона будет выведен перевод фразы: tags --}}
@section('name', __('tags'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
   

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('name') }}</th>
                                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
           @foreach ($tags as $tag)
    {{ Form::checkbox('tag_id[]', $tag->id) }}
	
    {{ $tag->name }}
@endforeach

			
        </table>
    </div>
 {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update product'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}
	
    {{ Form::close() }}
@endsection