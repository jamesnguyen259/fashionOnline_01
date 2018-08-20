@extends('layouts.app')

@section('title', 'Update your profile')
@section('content')
<div class="container">
    <div class="row m-y-2">
        <!-- edit form column -->
        <div class="col-lg-4 text-lg-center">
            <h2>{{ __('Update your profile') }}</h2>
            {!! Form::open(['method' => 'POST' , 'route' => 'users.update', 'enctype' => 'multipart/form-data']) !!}
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                <img src="{{ asset("$user->image_url") }}" class="m-x-auto img-fluid img-circle" alt="avatar" />
                <h6 class="m-t-2">Upload a different photo</h6>
                <label class="custom-file">
                    {!! Form::file('image_url'); !!}
                  <span class="custom-file-control">Choose file</span>
                </label>
        </div>
        <div class="col-lg-8 push-lg-4 personal-info">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Full name</label>
                    <div class="col-lg-9">
                        {!! Form::text( 'name', null, ['class' => 'form-control' , 'placeholder' => $user->name ]); !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9">
                        {!! Form::email( 'email', null, ['class' => 'form-control' , 'placeholder' => $user->email ]); !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                    <div class="col-lg-9">
                        {!! Form::text( 'address', null, ['class' => 'form-control' , 'placeholder' => $user->address ]); !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Description</label>
                    <div class="col-lg-9">
                        {!! Form::text( 'description', null, ['class' => 'form-control' , 'placeholder' => $user->description ]); !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                    <div class="col-lg-9">
                        {!! Form::text( 'phone', null, ['class' => 'form-control' , 'placeholder' => $user->phone ]); !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                        {!! Form::password( 'password', array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                    <div class="col-lg-9">
                        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        {!! Form::button('Update your profile', ['type' => 'submit', 'class' => 'btn btn-default']) !!}
                        {!! Form::button('Cancel', ['type' => 'reset', 'class' => 'btn btn-default']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
