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
                <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
            {{ Form::close() }}
            <div>
                <a class="login-link" href="{{ route('registration') }}">Register</a>
            </div>
            @include('partials.messages')
        </div>

    </div>
@stop