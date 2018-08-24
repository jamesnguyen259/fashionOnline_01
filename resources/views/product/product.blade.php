@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section id="advertisement">
        <div class="container">
            @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
            @endif
            <img src="images/shop/advertisement.jpg" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Sportswear</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Mens</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Womens</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Kids</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Fashion</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Households</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Interiors</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Clothing</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Bags</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Shoes</a></h4>
                                </div>
                            </div>
                        </div><!--/category-productsr-->

                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                    <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                    <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                    <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                                </ul>
                            </div>
                        </div><!--/brands_products-->

                        {{-- <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b>$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range--> --}}

                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                    <b> Total Products</b>:  {{$products->total()}}

                        @if($products->isEmpty())
                        <h1>Sorry, there's no product</h1>
                        @else
                        <?php $countP=0; ?>
                        <h2 class="title text-center">Features Items</h2>
                        @foreach ($products as $product)
                        <input type="hidden" id="pro_id<?php echo $countP; ?>" value="{{$product->id}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url("/product/details/$product->id")}}">
                                        <img src="{{$product->image_url}}" alt="" />
                                        </a>
                                        <h2>{{$product->price}}$</h2>
                                        <p><a href="{{url("/product/details/$product->id")}}">{{$product->name}}</a></p>
                                        <button class="btn btn-success add-to-cart" id="cartBtn<?php echo $countP; ?>">Add to cart</button>
                                        <div id="successMsg<?php echo $countP; ?>" class="alert alert-success"></div>
                                        <!-- <a href="{{url("/cart/additem/$product->id")}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        <a href="{{url("product/details/$product->id")}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a> -->
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php $countP++; ?>
                        @endforeach
                        {{$products->links()}}
                        @endif
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            <?php $maxP = count($products);
            for ($i=0;$i<$maxP;$i++) {
                ?>
            $('#successMsg<?php echo $i;?>').hide();
            $('#cartBtn<?php echo $i; ?>').click(function(){
                var pro_id<?php echo $i; ?> = $('#pro_id<?php echo $i;?>').val();
                $.ajax({
                    type: 'get',
                    url: '<?php echo url("/cart/additem");?>/'+pro_id<?php echo $i;?>,
                    success:function(){
                        $('#cartBtn<?php echo $i;?>').hide();
                        $('#successMsg<?php echo $i;?>').show();
                        $('#successMsg<?php echo $i;?>').append('Products has been added to cart');
                    }
                });
            });
            <?php
            }?>
        });
    </script>
@endsection
