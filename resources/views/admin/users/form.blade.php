<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', 'Username') !!}

				{!! Form::myInput('email', 'email', 'Email') !!}

				{!! Form::myInput('password', 'password', 'Password') !!}

				{!! Form::myInput('password', 'password_confirmation', 'Password again') !!}

				{!! Form::mySelect('roles[]', 'Role', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control select2']) !!}

{{--                {!! Form::mySelect('role', 'Role', $roles, null, ['class' => 'form-control select2']) !!}--}}

                {{--{!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]) !!}--}}

				{!! Form::myFile('avatar', 'Avatar') !!}

				{!! Form::myTextArea('bio', 'Bio') !!}
		</div>
	</div>
</div>
