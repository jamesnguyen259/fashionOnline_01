@extends('layouts.app')

@section('title', {{ __('Update your profile') }} )
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-5">
                <div class="update-form">
                    <h2>{{ __('Update your profile') }}</h2>
                    {!! Form::open(['method' => 'POST' , 'route' => 'users.update']) !!}
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                    {!! Form::text( 'name', null, ['placeholder' => __('Your name') ]); !!}
                    {!! Form::email( 'email', null, ['placeholder' => __('Your email address') ]); !!}
                    <input type="password" placeholder=" {{ __('Password') }} " name="password" />
                    <input type="password" placeholder=" {{ __('Confirm password') }} " name="password_confirmation" />
                    {!! Form::submit( __('Sign up') , ['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
