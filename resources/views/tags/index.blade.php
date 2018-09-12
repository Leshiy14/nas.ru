{{-- ��� ������ ������� ����� �� ��, ���������� ��� Bootstrap --}}

{{-- ���� ������ ��������� (���������) resources/views/base.blade.php --}}
@extends('base')

{{-- � ������ name ������������� ������� ����� ������� ������� �����: tags --}}
@section('name', __('tags'))

{{-- � ������ main ������������� ������� ����� �������� ����� --}}
@section('main')
    <p>
        {{-- ����� Html::secureLink(URL, �������, ��������) ������ ������. --}}
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