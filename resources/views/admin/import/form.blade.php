@extends('admin.default')

@section('content')
    <div class="container">
        <div class="row">



            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Import CSV form</div>
                    <div class="card-body">
                        {{ Breadcrumbs::render('csv-import') }}
                        <br/>
                        <br/>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/csv-import') }}" accept-charset="UTF-8"
                              class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('table') ? 'has-error' : ''}}">
                                <label for="table" class="control-label">{{ 'Section' }}</label>
                                <select class="form-control" name="table" type="select" id="table" required>
                                    <option value="users"> Users </option>
                                </select>
                                {!! $errors->first('table', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('csv_file') ? 'has-error' : ''}}">
                                <label for="csv_file" class="control-label">{{ 'CSV File' }}</label>
                                <input class="form-control" name="csv_file" type="file" id="csv_file" required>
                                {!! $errors->first('csv_file', '<p class="help-block">:message</p>') !!}
                            </div>


                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Import">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
