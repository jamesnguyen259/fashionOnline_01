@extends('layouts.app')

@section('title', 'Profile')
@section('content')
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
            @endif
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $user->name }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{ asset("$user->image_url") }}" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Full name: </td>
                        <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                        <td>Email: </td>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <td>Description: </td>
                        <td><textarea id=" name" spellcheck="false" placeholder=" {{ $user->description }}"></textarea></td>
                      </tr>
                      <tr>
                        <tr>
                            <td>Home Address</td>
                            <td><textarea id="address" spellcheck="false" placeholder=" {{ $user->address }}"></textarea></td>
                      </tr>
                            <td>Phone Number</td>
                            <td>{{ $user->phone }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
                <span class="pull-right">
                            <a href="{{ route('users.edit') }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                </span>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
