@extends('layouts.frontend.layout')
@section('dropdown-cls') hidden-category-dropdown @stop
@section('content')

<div class="content-page woocommerce">
            <div class="container">
                <div class="cart-content-page">
                    <h2 class="title-shop-page">my cart</h2>
                        <div class="table-responsive">
                            <table cellspacing="0" class="shop_table cart table">
                                <thead>
                                    <tr>
                                        <th class="product-remove">Action</th>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if ($cartItems->isEmpty()){
                                    echo '<h2 class="title-shop-page" style="color:red;">Cart is Empty</h2>';
                                }else{
                                    ?>
                                <form action="" method="get" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                   @foreach($cartItems as $cartItem)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a class="remove" href="{{url('/cart/remove')}}/<?php echo $cartItem->rowId; ?>"><i class="fa fa-times"></i></a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#"><img  src="{{asset('assets/uploads/stocks/'.$cartItem->options->img) }}" alt=""/></a>                    
                                        </td>
                                        <td class="product-name">
                                            <a href="#">{{$cartItem->name}} </a>                  
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">${{$cartItem->price}}</span>                  
                                        </td>
                                        <td class="product-quantity">
                                            <div class="info-qty">
                                                <a href="#" class="qty-down" id="moins{{$cartItem->id}}"  ><i class="fa fa-angle-left" onclick="minus{{$cartItem->id}}"></i></a>
                                                <span class="qty qty-val" id="count{{$cartItem->id}}"> {{$cartItem->qty}}</span>
                                                <a href="#" class="qty-up" id="plus{{$cartItem->id}}" ><i class="fa fa-angle-right" onclick="plus{{$cartItem->id}}"></i></a>
                                                <a  class="updatecart" id="{{$cartItem->rowId}}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            </div>          
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">${{$cartItem->subtotal}}</span>                  
                                        </td>
                                    </tr>
                                     @endforeach     
                            
                                </form>
                                
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <div class="coupon">
                                                <label for="coupon_code">Coupon:</label> 
                                                <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code"> 
                                                <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                            </div>
                                        </td>
                                    </tr>     
                                </tbody>
                            </table>
                        </div>
                   
                    <div class="cart-collaterals">
                        <div class="cart_totals ">
                            <h2>Cart Totals</h2>
                            <div class="table-responsive">
                                <table cellspacing="0" class="table">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><strong class="amount">${{Cart::subtotal()}}</strong></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul id="shipping_method">
                                                    <li>
                                                        <input type="radio" class="shipping_method" checked="checked" value="free_shipping" id="shipping_method_0_free_shipping" data-index="0" name="shipping_method[0]">
                                                        <label for="shipping_method_0_free_shipping">Free Shipping</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" class="shipping_method" value="local_delivery" id="shipping_method_0_local_delivery" data-index="0" name="shipping_method[0]">
                                                        <label for="shipping_method_0_local_delivery">Local Delivery (Free)</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" class="shipping_method" value="local_pickup" id="shipping_method_0_local_pickup" data-index="0" name="shipping_method[0]">
                                                        <label for="shipping_method_0_local_pickup">Local Pickup (Free)</label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="amount">${{Cart::total()}}</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="wc-proceed-to-checkout">
                                <a class="checkout-button button alt wc-forward" href="/checkout">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <!-- End Content Page -->
 <script>
    @foreach($cartItems as $cartItem)
      var count{{$cartItem->id}} = 1;
      var countEl{{$cartItem->id}} = document.getElementById("count{{$cartItem->id}}");
      function plus{{$cartItem->id}}() {
        count{{$cartItem->id}}++;
        countEl{{$cartItem->id}}.value = count{{$cartItem->id}};
      }
      function minus{{$cartItem->id}}() {
        if (count{{$cartItem->id}} > 1) {
            count{{$cartItem->id}}--;
            countEl{{$cartItem->id}}.value = count{{$cartItem->id}};
        }
      }
    @endforeach
</script>
<?php } ?>       
@stop