{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Create product --}}
@section('name', __('Create product'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP POST на маршрут products.create --}}
    {{
        Form::model($product, [
            'method' => 'POST',
            'route'  => 'products.store',
			'files' => 'true'
        ])
    }}

    {{-- Включаем шаблон resources/views/products/partials/form.blade.php --}}
    @include('products.partials.form')

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
            __('Save product'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection