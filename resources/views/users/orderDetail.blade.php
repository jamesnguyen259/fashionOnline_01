@extends('layouts.app')

@section('title', 'User order')

@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order details</h1>
                    </div>
                </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3>List all orders details</h3>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Subprice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orderDetails as $orderDetail)
                                            <tr>
                                            <td>{!! $orderDetail->id !!}</td>
                                            <td>{!! $orderDetail->product->name !!}</td>
                                            <td>{!! $orderDetail->quantity !!}</td>
                                            <td>{!! $orderDetail->sub_price !!}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
@endsection
