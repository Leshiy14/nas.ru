{{-- Это шаблон перечня тегов из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: tags --}}
@section('name', __('tags'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('tags.create'),
                __('Create tag')
            )
        }}
    </p>

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
                <tr>
                    <td>{{ $tag->name }}</td>
                                        <td>{{ Html::secureLink(
                        route('tags.edit', $tag->id),
                        __('Edit tag')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('tags.remove', $tag->id),
                        __('Remove tag')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection