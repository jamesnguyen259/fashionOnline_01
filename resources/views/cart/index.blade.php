@extends('layouts.app')

@section('title','Cart')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div id="updateDiv">
                @if (session('status'))
                <div class="alert alert-success">
                {{ session('status') }}
                </div>
                @endif
                @if($cartItems->isEmpty())
                <h1 align="center">Cart is empty</h1>
                <div align="center">
                    <img align="center" src="/images/shop/empty-cart.png">
                </div>
                @else()
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <?php $count =1;?>
                        <tbody>
                        @foreach($cartItems as $cartItem)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{$cartItem->options->img}}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$cartItem->name}}</a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>${{$cartItem->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}">
                                        <input type="hidden" id="proId<?php  echo $count;?>" value="{{$cartItem->id}}">
                                        <input type="number" name="qty" id="upCart<?php echo $count;?>" size="2" style="text-align:center; max-width:50px; " value="{{$cartItem->qty}}">
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url("/cart/remove/$cartItem->rowId")}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <?php $count++;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                                <ul>
                                    <li>Cart Sub Total <span>${{Cart::subtotal()}}</span></li>
                                    <li>Eco Tax <span>${{Cart::tax()}}</span></li>
                                    <li>Shipping Cost <span>Free</span></li>
                                    <li>Total <span>${{Cart::total()}}</span></li>
                                </ul>
                            <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section><!--/#do_action-->

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            <?php for ($i=1; $i<20; $i++) {?>
            $('#upCart<?php echo $i; ?>').on('change keyup', function(){
                var newqty = $('#upCart<?php echo $i; ?>').val();
                var rowId = $('#rowId<?php echo $i; ?>').val();
                var proId = $('#proId<?php echo $i; ?>').val();
               if(newqty <=0){ alert('Enter only valid qty'); }
                else {
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/cart/update');?>/'+proId,
                        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                        success: function (response) {
                            console.log(response);
                             $('#updateDiv').html(response);
                        }
                    });
                }
            });
        <?php } ?>
        });
    </script>
@endsection
