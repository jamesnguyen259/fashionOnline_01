@extends('layouts.app')

@section('title', 'Profile')
@section('content')
<div id="page-wrapper">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
            <h1 class="page-header">User information</h1>
        </div>
      </div>
        @if (session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
        @endif
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                      <img alt="User Pic" src="{{ asset("$user->image_url") }}" class="img-circle img-responsive">
                      </div>
                    <div class=" col-md-9 col-lg-9 ">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
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
                              <td>{{ $user->description }}</td>
                            </tr>
                            <tr>
                            <tr>
                                <td>Home Address</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                                <td>Phone Number</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer">
                    <a href="#" type="button" class="btn btn-sm btn-warning">Make a new post</a>
                    <span class="pull-right">
                      <a href="{{ route('users.edit') }}" type="button" class="btn btn-sm btn-warning">Edit user profile</a>
                    </span>
                  </div>
                </div>
              </div>
      </div>
    </div>
   </div>
@endsection
