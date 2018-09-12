{{-- ��� ������ ����� ���������� ������ � ��, ���������� ��� Bootstrap --}}

{{-- ���� ������ ��������� (���������) resources/views/base.blade.php --}}
@extends('base')

{{-- � ������ name ������������� ������� ����� ������� ������� �����: Create product --}}
@section('name', __('Create product'))

{{-- � ������ main ������������� ������� ����� �������� ����� --}}
@section('main')

    {{-- ����� ������������� ������� HTTP POST �� ������� products.create --}}
    {{
        Form::model($product, [
            'method' => 'POST',
            'route'  => 'products.store',
			'files' => 'true'
        ])
    }}

    {{-- �������� ������ resources/views/products/partials/form.blade.php --}}
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
	
    {{-- ������ ������������ ����� --}}
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