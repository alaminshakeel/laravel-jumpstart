@extends('admin.default')

@section('page-header')
	User <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')

    {{ Breadcrumbs::render('admin.users.create') }}


	{!! Form::open([
			'action' => ['UserController@store'],
			'files' => true
		])
	!!}

		@include('admin.users.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>

	{!! Form::close() !!}

@stop
