<!-- ======================================= brand categories ============================================================ -->
<ul class="row product-grid auto-clear brandimgCate" >
@foreach ($stocks_brand as $item_stock_cate)
    <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="item-product">
            <div class="product-thumb">
                <a class="product-thumb-link" href="{!! url('stock-detail',[$item_stock_cate->id]) !!}">
                    <img class="first-thumb" alt="" src="{!! asset('assets/uploads/stocks/'.$item_stock_cate->image) !!}">
                    @foreach($imageStock as $item_detail)
                        @if($item_stock_cate->id == $item_detail['id'])
                        <img class="second-thumb" src="{{ asset('assets/uploads/stocks/alias/'.$item_detail['caption']) }}" alt=""/>
                        @endif
                    @endforeach
                </a>
                <div class="product-info-cart">
                    <div class="product-extra-link">
                        <a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
                        <a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
                        <a class="quickview-link fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></a>
                    </div>
                    <a class="addcart-link" href="{{url('/cart/addItemCate')}}/<?php echo $item_stock_cate->id; ?>"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                </div>
            </div>
            <div class="product-info">
                <h3 class="title-product"><a href="#">{!! $item_stock_cate->name !!}</a></h3>
                <div class="info-price">
                    <span>${!! $item_stock_cate->cost !!}</span><del>$17.96</del>
                </div>
                <div class="product-rating">
                    <div class="inner-rating" style="width:100%"></div>
                    <span>(6s)</span>
                </div>
            </div>
             @if( $item_stock_cate->discount  == 40) 
                <div class="percent-saleoff">
                    <span><label>{!! $item_stock_cate->discount !!}%</label>OFF</span>
                </div>
            
            @endif
            @if( $item_stock_cate->discount  == 30) 
                <div class="percent-saleoff">
                    <span><label>{!! $item_stock_cate->discount !!}%</label>OFF</span>
                </div>
            
            @endif
            @if( $item_stock_cate->discount  == 15) 
                <div class="percent-saleoff">
                    <span><label>{!! $item_stock_cate->discount !!}%</label>OFF</span>
                </div>
            
            @endif
            @if( $item_stock_cate->discount  == 5) 
                <div class="percent-saleoff">
                    <span><label>{!! $item_stock_cate->discount !!}%</label>OFF</span>
                </div>
            
            @endif
        </div>
    </li>
@endforeach
</ul>