@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="step-one">
                <h2 class="heading">Step1</h2>
            </div>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="shopper-info">
                            <p>Guest Information</p>
                                {!! Form::open(['route' => 'checkout.store' , 'method' => 'POST'])!!}
                                <input type="text" value="{{$user->name}}" placeholder="Full name" name="name">
                                <input type="text" value="{{$user->email}}" placeholder="Email" name="email">
                                <input type="text" value="{{$user->address}}" placeholder="Address" name="address">
                                <select name="payment">
                                        <option>-- Payment --</option>
                                        <option value="Direct Bank Transfer">Direct Bank Transfer</option>
                                        <option value="Paypal">Paypal</option>
                                    </select>
                               <!--  <a class="btn btn-primary" href="">Continue</a> -->
                               <button class="btn btn-primary" type="submit">Continue</button>
                                 {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Shipping Order</p>
                            <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                            <label><input type="checkbox"> Shipping to bill address</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

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
                    <tbody>
                        @foreach($cartItems as $cartItem)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="images/cart/one.png" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$cartItem->name}}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>${{$cartItem->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <p>{{$cartItem->qty}}</p>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url("/cart/remove/$cartItem->rowId")}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
