@extends('layouts.app')

@section('title', 'Login page')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="signup-form">
                    <h2>{{ __('New User Signup!') }}</h2>
                    {!! Form::open(['method' => 'POST' , 'route' => 'register']) !!}
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                    {!! Form::text( 'name', null, ['placeholder' => __('Your name') ]); !!}
                    {!! Form::email( 'email', null, ['placeholder' => __('Your email address') ]); !!}
                    {!! Form::password( 'password', null, ['placeholder' => __('Password') ]); !!}
                    {!! Form::password( 'password_confirmation', null, ['placeholder' => __('Confirm password') ]); !!}
                    {{ Form::button('Sign up', ['type' => 'submit', 'class' => 'btn btn-default'] )  }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
