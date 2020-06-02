@extends('admin.default')

@section('page-header')
    Users
    <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    @can('user_create',Auth::user())
        <div class="mB-20">
            <a href="{{ route(ADMIN . '.users.create') }}" class="btn btn-info">
                {{ trans('app.add_button') }}
            </a>
        </div>
    @endcan

    {{ Breadcrumbs::render('admin.users.index') }}


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th style="width:227px">Actions</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th style="width:227px">Actions</th>
            </tr>
            </tfoot>

            <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><a href="{{ route(ADMIN . '.users.edit', $item->id) }}">{{ $item->name }}</a></td>
                    <td>{{ $item->email }}</td>
                    <td>

                            <span class="btn btn-primary btn-sm">
                                @foreach($item->roles as $role)
                                    {{ $role->label }}
                                @endforeach
                            </span>

                    </td>
                    <td>
                        <ul class="list-inline">
                            @can('user_edit',Auth::user())
                                <li class="list-inline-item">
                                    <a href="{{ route(ADMIN . '.users.edit', $item->id) }}"
                                       title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span
                                            class="ti-pencil"></span></a></li>
                            @endcan
                            @can('user_delete',Auth::user())
                                <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.users.destroy', $item->id),
                                        'method' => 'DELETE',
                                        ])
                                    !!}

                                    <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i
                                            class="ti-trash"></i></button>

                                    {!! Form::close() !!}
                                </li>
                            @endcan
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
