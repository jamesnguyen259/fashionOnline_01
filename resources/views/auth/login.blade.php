@extends('layouts.app')

@section('title', 'Login page')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-5">
                <div class="login-form"><!--login form-->
                    <h2>{{ __('Login to your account') }}</h2>
                    {!! Form::open(['method' => 'POST' , 'route' => 'login']) !!}
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                    {!! Form::email( 'email', null, ['placeholder' => __('Your email address') ]); !!}
                    {!! Form::password('password', ['placeholder' => __('Password') ] ) !!}
                    <span>
                        {!! Form::checkbox( 'remember', null ); !!}
                        {{ __('Remember me') }}
                    </span>
                    {!! Form::submit( __('Login') , ['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                    <a class="btn btn-link" href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}
                    </a>
                    <a class="btn btn-link" href="{{ route('register') }}"> {{ __('Sign up') }}
                    </a>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
