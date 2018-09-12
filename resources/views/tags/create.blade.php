{{-- ��� ������ ����� ���������� ���� � ��, ���������� ��� Bootstrap --}}

{{-- ���� ������ ��������� (���������) resources/views/base.blade.php --}}
@extends('base')

{{-- � ������ name ������������� ������� ����� ������� ������� �����: Create tag --}}
@section('name', __('Create tag'))

{{-- � ������ main ������������� ������� ����� �������� ����� --}}
@section('main')

    {{-- ����� ������������� ������� HTTP POST �� ������� .create --}}
    {{
        Form::model($tag, [
            'method' => 'POST',
            'route'  => 'tags.store'
        ])
    }}

    {{-- �������� ������ resources/views/tags/partials/form.blade.php --}}
    @include('tags.partials.form')

    {{-- ������ ������������ ����� --}}
    {{
        Form::submit(
            __('Save tag'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection