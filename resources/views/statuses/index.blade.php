{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Products --}}
@section('title', __('Statuses'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('statuses.create'),
                __('Create status')
            )
        }}
    </p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($statuses as $status)
                <tr>
                    <td>{{ $status->name }}</td>
                    <td>{{ Html::secureLink(
                        route('statuses.edit', $status->id),
                        __('Edit status')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('statuses.remove', $status->id),
                        __('Remove status')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
