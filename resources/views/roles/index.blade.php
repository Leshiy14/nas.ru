{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Products --}}
@section('title', __('Roles'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('roles.create'),
                __('Create role')
            )
        }}
    </p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Name role') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ Html::secureLink(
                        route('roles.edit', $role->id),
                        __('Edit role')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('roles.remove', $role->id),
                        __('Remove role')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
