<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Label: ', ['class' => 'control-label']) !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Permissions: ', ['class' => 'control-label']) !!}
{{--    {!! Form::select('permissions[]', $permissions, isset($role) ? $role->permissions->pluck('name') : [], ['class' => 'form-control', 'multiple' => true]) !!}--}}
    <table class="table table-bordered table-hover table-sm" data-toggle="datatables">
        <thead class="thead-light">
        <tr>
            <th scope="col" data-dt-order="2">Name</th>
            <th scope="col">Description</th>
            <th scope="col" class="text-center" data-dt-nosort></th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $key => $name)
            <tr>
                <td class="text-monospace">{{ $key }}</td>
                <td>{{ $name }}</td>
                <td class="text-center">
                    <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                        {{--<input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer">--}}
                        {!! Form::checkbox('permissions[]', $key, (in_array($key,$role->permissions->pluck('name')->toArray())?1:0)) !!}
                        <label for="inputCall2" class=" peers peer-greed js-sb ai-c">


                        </label>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
