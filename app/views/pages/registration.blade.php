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
                <div class="form-group @if($errors->has('password_confirmation'))has-feedback has-error @endif"">
                    <input class="form-control login-field" value="" name="password_confirmation" placeholder="Password confirmation" id="password_confirmation" type="password">
                    <label class="login-field-icon fui-lock" for="password_confirmation"></label>
                    @include('partials.form-errors', array('field' => 'password_confirmation'))
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