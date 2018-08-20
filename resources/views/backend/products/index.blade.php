@extends('backend.layouts.app')

@section('title', 'Products')

@section('content')
        <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">All products</h1>
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
                                <h3>List all products</h3>
                                <a href="{!! action('Admin\ProductsController@create') !!}" class="btn btn-warning"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table">
                                @if ($products->isEmpty())
                                <p> There is no product.</p>
                                @else
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Preview</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Brand</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                            <td>{!! $product->id !!}</td>
                                            <td>
                                            <a href="">{!! $product->name !!}</a>
                                            </td>
                                            <td><img src="{{asset("$product->image_url")}}" alt=""></td>
                                            <td>{!! $product->title !!}</td>
                                            <td>{!! $product->description !!}</td>
                                            <td>{!! $product->brand->name !!}</td>
                                            <td>{!! $product->price !!} $</td>
                                            <td>
                                                <a href="{!! action('Admin\ProductsController@edit', $product->id) !!}" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <script>
                                                  function ConfirmDelete(){
                                                    var x = confirm("Are you sure you want to delete?");
                                                        if (x)
                                                            return true;
                                                        else
                                                            return false;
                                                    }
                                                </script>
                                                {{ Form::open(array('url' => 'admin/products/' . $product->id, 'class' => 'pull-right', 'onsubmit' => 'return ConfirmDelete()')) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'])}}
                                                {{ Form::close() }}
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                                <!-- /.table-responsive -->
                                {{ $products->links() }}
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
