@extends('backend.layouts.app')

@section('title', 'Edit users')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit product</h1>
        </div>
    </div>
        <div class="row">
                <legend>Edit product information</legend>
                <div class="col-lg-4">
                    {!! Form::open(['method' => 'PUT', 'route' => ['products.update', $product->id], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                    @endif
                        <img src="{{ asset($product->image_url) }}" class="m-x-auto img-fluid img-circle" alt="avatar" />
                        <label class="custom-file">
                            {!! Form::file('image_url'); !!}
                        <span class="custom-file-control">Choose file</span>
                        </label>
                </div>
                    <div class="col-lg-8">
                    <div class="panel">
                    <div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" placeholder="{{ $product->name }}" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">Title</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="email" placeholder="{{ $product->title }}" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-lg-2 control-label">Description</label>
                            <div class="col-lg-10">
                                <textarea name="description" id="inputDescription" class="form-control" rows="3" placeholder="{{ $product->description }}" ></textarea>
                                <!-- <input type="password" class="form-control" name="password"> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-lg-2 control-label">Price</label>
                            <div class="col-lg-10">
                                <input type="number" name="price" id="inputPrice" class="form-control" placeholder="{{$product->price}}">
                                <!-- <input type="password" class="form-control" name="password_confirmation"> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input" class="col-sm-2 control-label">Brand</label>
                            <div class="col-sm-2">
                                <select name="brandID" id="inputBrandID" class="form-control">
                                   @foreach($brands as $brand)
                                    <option value="{!! $brand->id !!}"
                                        @if(in_array($brand->name, $selectedBrands))
                                            selected="selected"
                                        @endif >{!! $brand->name !!}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
