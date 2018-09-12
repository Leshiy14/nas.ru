{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова name --}}
    {{ Form::label('name', __('name')) }}

    {{-- Поле ввода наименования товара --}}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{-- Метка к полю ввода описания товара --}}
    {{-- На метке будет выведен перевод слова description --}}
    {{ Form::label('description', __('description')) }}

    {{-- Поле ввода описания товара --}}
    {{ Form::text('description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{-- Метка к полю ввода цены товара --}}
    {{-- На метке будет выведен перевод слова Price --}}
    {{ Form::label('price', __('price')) }}

    {{-- Поле ввода цены товара --}}
    {{ Form::number('price', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{-- Метка к полю ввода количества товара --}}
    {{-- На метке будет выведен перевод слова count --}}
    {{ Form::label('count', __('count')) }}

    {{-- Поле ввода количества товара --}}
    {{ Form::number('count', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
{{-- Метка к полю ввода наименования товара --}}
{{-- На метке будет выведен перевод слова Title --}}
{{ Form::label('name', __('Name')) }}

{{-- Поле ввода наименования товара --}}
{{ Form::file('path', null, ['class' => 'form-control']) }}
</div>

