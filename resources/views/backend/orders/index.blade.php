@extends('backend.layouts.app')

@section('title', 'Orders')

@section('content')
        <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">All orders</h1>
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
                                <h3>List all orders</h3>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table">
                                @if ($orders->isEmpty())
                                <p> There is no order.</p>
                                @else
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Total</th>
                                                <th>Date created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                            <td>{!! $order->id !!}</td>
                                            <td>{!! $order->user->name !!}</td>
                                            <td>{!! $order->order_status !!}</td>
                                            <td>{!! $order->payment !!}</td>
                                            <td>{!! $order->name !!}</td>
                                            <td>{!! $order->email !!}</td>
                                            <td>{!! $order->address !!}</td>
                                            <td>${!! $order->total !!}</td>
                                            <td>{!! $order->date !!} </td>
                                            <td>
                                                <script>
                                                  function ConfirmAccept(){
                                                    var x = confirm("Are you sure you want to accept this order?");
                                                        if (x)
                                                            return true;
                                                        else
                                                            return false;
                                                    }
                                                </script>
                                                @if($order->order_status == 'not accepted')
                                                {{ Form::open(array('url' => 'admin/orders/' . $order->id, 'class' => 'pull-right', 'onsubmit' => 'return ConfirmAccept()', 'method' => 'POST')) }}
                                                {{ Form::button('<i class="glyphicon glyphicon-ok"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'])}}
                                                {{ Form::close() }}
                                                @else
                                                No action
                                                @endif
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                                <!-- /.table-responsive -->
                                {{ $orders->links() }}
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
@endsection
