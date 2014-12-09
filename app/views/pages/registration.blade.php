@extends('html')

@section('content')

    <div class="login-screen">
        <div class="logo-big">
            <span class="fui-checkbox-checked"></span>
            Welcome to <small>TodoApp</small>
        </div>

        <div class="login-form">

            {{ Form::open() }}
                @include('partials.user-form')
                <div class="form-group @if($errors->has('password-confirm'))has-feedback has-error @endif"">
                    <input class="form-control login-field" value="" name="password-confirm" placeholder="Password confirmation" id="password-confirm" type="password">
                    <label class="login-field-icon fui-lock" for="password-confirm"></label>
                    @include('partials.form-errors', array('field' => 'password-confirm'))
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
            {{ Form::close() }}
            <div>
                <a class="login-link" href="{{ route('login') }}">Login</a>
            </div>
            @include('partials.messages')
        </div>

    </div>

@stop