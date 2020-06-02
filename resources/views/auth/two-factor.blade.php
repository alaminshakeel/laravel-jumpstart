@extends('layouts.app')

@section('content')

    <h4 class="fw-300 c-grey-900 mB-40">Two Factor Authentication Verification</h4>
    <form method="POST" action="{{ route('two-factor-auth') }}">
        {{ csrf_field() }}

        @if (session('message'))
            <ul class="alert alert-danger">
                <li>{{ session('message') }}</li>
            </ul>
        @endif

        <div class="form-group{{ $errors->has('code_2fa') ? ' has-error' : '' }}">
            <label for="code_2fa" class="text-normal text-dark">Code</label>
            <input id="code_2fa" type="text" class="form-control" name="code_2fa" value="{{ old('code_2fa') }}"
                   autofocus>

            @if ($errors->has('code_2fa'))
                <span class="form-text text-danger">
                    <small>{{ $errors->first('code_2fa') }}</small>
                </span>
            @else
                <span class="form-text text-success">
                    <small>A code has been sent to your email. please type here to verify.</small>
                </span>
            @endif
        </div>


        <div class="form-group">
            <div class="peers ai-c jc-sb fxw-nw">
                <a href="{{ $_SERVER['REQUEST_URI'] }}">
                    <div class="peer">
                        <span class="btn btn-primary">Resend Code</span>
                    </div>
                </a>
                <div class="peer">
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
            </div>
        </div>
    </form>

@endsection
