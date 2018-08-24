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
                @endif
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
