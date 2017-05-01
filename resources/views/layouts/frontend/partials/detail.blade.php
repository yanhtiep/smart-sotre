@extends('layouts.frontend.layout')
@section('dropdown-cls') hidden-category-dropdown @stop
@section('content')
<div class="content-shop left-sidebar">
    <div class="container">
        <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-12 main-content">
                        <div class="main-content-shop">
                            <div class="main-detail">
                                <div class="row">
                                    <div class="col-md-5 col-sm-12 col-xs-12">
                                        <div class="detail-gallery">
                                            <div class="mid">
                                                <img src="{{ asset('assets/uploads/stocks/'.$stock_detail->image) }}" alt=""/>
                                                <p><i class="fa fa-search"></i> Mouse over to zoom in</p>
                                            </div>
                                            <div class="carousel">
                                                <ul>
                                                    @foreach($imageDetail as $img_detail)
                                                    <li style="height: 90px;">
                                                        <a href="#"><img src="{!! asset('assets/uploads/stocks/alias/'.$img_detail->caption) !!}" alt=""/></a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="gallery-control">
                                                <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
                                                <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    <div class="col-md-7 col-sm-12 col-xs-12">
                                        <div class="detail-info">
                                            <h2 class="title-detail">{!! $stock_detail->name !!}</h2>
                                            <div class="product-rating">
                                                <div class="inner-rating" style="width:100%"></div>
                                            </div>
                                            <div class="product-order">
                                                <span>235 Orders</span>
                                            </div>
                                            <div class="product-code">
                                                <label>Item Code: </label> <span>#12980496023</span>
                                            </div>
                                            <div class="product-stock">
                                                <label>Availability: </label> <span>In stock</span>
                                            </div>
                                            <div class="info-price info-price-detail">
                                                <label>Price:</label> <span>${!! $stock_detail->cost !!}</span><del>$17.96</del>
                                            </div>
                                            <div class="attr-info">
                                                <div class="attr-product">
                                                    <label>Color</label>
                                                    <div class="attr-color">
                                                        <a href="#" class="toggle-color">Select Color</a>
                                                        <ul class="list-color">
                                                            <li><a href="#">Black</a></li>
                                                            <li><a href="#">Red</a></li>
                                                            <li><a href="#">Green</a></li>
                                                            <li><a href="#">White</a></li>
                                                            <li><a href="#">Pink</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="attr-product">
                                                    <label>Size</label>
                                                    <div class="attr-size">
                                                        <a href="#" class="toggle-size">Select Size</a>
                                                        <ul class="list-size">
                                                            <li><a href="#">S</a></li>
                                                            <li><a href="#">M</a></li>
                                                            <li><a href="#">L</a></li>
                                                            <li><a href="#">XL</a></li>
                                                            <li><a href="#">XXL</a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="size-chart">Size Chart</span>
                                                </div>
                                                <div class="attr-product">
                                                    <label>Qty</label>
                                                    <div class="info-qty">
                                                        <a class="qty-down" href="#"><i class="fa fa-minus"></i></a>
                                                        <span class="qty-val">1</span>
                                                        <a class="qty-up" href="#"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                <a class="addcart-link" href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                                <div class="product-social-extra">
                                                    <a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
                                                    <a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
                                                    <a class="email-link" href="#"><i class="fa fa-envelope"></i></a>
                                                    <a class="print-link" href="#"><i class="fa fa-print"></i></a>
                                                    <a class="share-link" href="#"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                            <!-- End Attr Info -->
                                        </div>
                                        <!-- Detail Info -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Main Detail -->
                            <div class="tab-detail">
                                <div class="title-tab-detail">
                                    <ul role="tablist">
                                        <li class="active"><a href="#details" data-toggle="tab">Product Details </a></li>
                                        <li><a href="#feedback" data-toggle="tab">Feedback</a></li>
                                        <li><a href="#shipping" data-toggle="tab">Shipping & Payment</a></li>
                                        <li><a href="#seller" data-toggle="tab">Seller Guarantees</a></li>
                                    </ul>
                                </div>
                                <div class="content-tab-detail">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="details">
                                            <div class="table-content-tab-detail">
                                                <div class="title-table-detail"><span>Return Policy</span></div>
                                                <div class="icon-table-detail"><img src="{{ASSETS_PATH}}images/grid/rv1.png" alt="" /></div>
                                                <div class="info-table-detail">
                                                    <p>If the product you receive is not as described or low quality, the seller promises that you may return it before order completion (when you click ‘Confirm Order Received’ or exceed confirmation timeframe) and receive a full refund. The return shipping fee will be paid by you. Or, you can choose to keep the product and agree the refund amount directly with the seller.</p>
                                                </div>
                                            </div>
                                            <div class="table-content-tab-detail">
                                                <div class="title-table-detail"><span>Seller Service</span></div>
                                                <div class="icon-table-detail"><img src="{{ASSETS_PATH}}images/grid/rv2.png" alt="" /></div>
                                                <div class="info-table-detail">
                                                    <h3>On-time Delivery</h3>
                                                    <p>If you do not receive your purchase within 60 days, you can ask for a full refund before order completion (when you click ‘Confirm Order Received’ or exceed confirmation timeframe).</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="feedback">
                                            <div class="inner-content-tab-detail">
                                                <h2>Review</h2>
                                                <p>Donec pede justo, fringilla vel, aliquet nec, vulpu tate eget. Sed quia consequuntur magni dolores. Id eges tas massa sem et elit. Donec pede justo, fringilla vel, aliquet nec, vulpu tate eget. Sed quia consequuntur magni dolores. Id eges tas massa sem et elit.</p>
                                                <p>Qenean commodo ligula eget dolor. Aenean massa. Cumt sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla onsequat mas quis enim. Donec pede justo, fringilla vel, aliquet nec, vulpu tate eget. Sed quia consequuntur magni dolores. Id eges tas massa sem et elit. Viva mus semper cursus libero</p>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="shipping">
                                            <div class="table-content-tab-detail">
                                                <div class="title-table-detail"><span>Return Policy</span></div>
                                                <div class="icon-table-detail"><img src="{{ASSETS_PATH}}images/grid/rv1.png" alt="" /></div>
                                                <div class="info-table-detail">
                                                    <p>If the product you receive is not as described or low quality, the seller promises that you may return it before order completion (when you click ‘Confirm Order Received’ or exceed confirmation timeframe) and receive a full refund. The return shipping fee will be paid by you. Or, you can choose to keep the product and agree the refund amount directly with the seller.</p>
                                                </div>
                                            </div>
                                            <div class="table-content-tab-detail">
                                                <div class="title-table-detail"><span>Seller Service</span></div>
                                                <div class="icon-table-detail"><img src="{{ASSETS_PATH}}images/grid/rv2.png" alt="" /></div>
                                                <div class="info-table-detail">
                                                    <h3>On-time Delivery</h3>
                                                    <p>If you do not receive your purchase within 60 days, you can ask for a full refund before order completion (when you click ‘Confirm Order Received’ or exceed confirmation timeframe).</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="seller">
                                            <div class="inner-content-tab-detail">
                                                <h2>Custom service</h2>
                                                <p>Donec pede justo, fringilla vel, aliquet nec, vulpu tate eget. Sed quia consequuntur magni dolores. Id eges tas massa sem et elit. Donec pede justo, fringilla vel, aliquet nec, vulpu tate eget. Sed quia consequuntur magni dolores. Id eges tas massa sem et elit.</p>
                                                <p>Qenean commodo ligula eget dolor. Aenean massa. Cumt sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla onsequat mas quis enim. Donec pede justo, fringilla vel, aliquet nec, vulpu tate eget. Sed quia consequuntur magni dolores. Id eges tas massa sem et elit. Viva mus semper cursus libero</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Detail -->
                            <div class="upsell-detail">
                                <h2 class="title-default">UPSELL PRODUCTS</h2>
                                <div class="upsell-detail-slider">
                                    <div class="wrap-item">
                                    @foreach($stock_cate as $item_stock_cate)
                                        <div class="item">
                                            <div class="item-product">
                                                <div class="product-thumb">
                                                    <a class="product-thumb-link" href="{!! url('stock-detail',[$item_stock_cate->id ]) !!}">
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
                                                            <a class="quickview-link" href="#"><i class="fa fa-search"></i></a>
                                                        </div>
                                                        <a class="addcart-link" href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
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
                                                        <span><label>{!! $item_stock_cate->discount  !!}%</label>OFF</span>
                                                    </div>
                                                
                                                @endif
                                                @if( $item_stock_cate->discount   == 30) 
                                                    <div class="percent-saleoff">
                                                        <span><label>{!! $item_stock_cate->discount  !!}%</label>OFF</span>
                                                    </div>
                                                
                                                @endif
                                                @if( $item_stock_cate->discount   == 15) 
                                                    <div class="percent-saleoff">
                                                        <span><label>{!! $item_stock_cate->discount  !!}%</label>OFF</span>
                                                    </div>
                                                
                                                @endif
                                                @if( $item_stock_cate->discount   == 5) 
                                                    <div class="percent-saleoff">
                                                        <span><label>{!! $item_stock_cate->discount  !!}%</label>OFF</span>
                                                    </div>
                                                
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- End Item -->
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- End Upsell Detail -->
                        </div>
                        <!-- End Main Content Shop -->
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                        <div class="sidebar-shop sidebar-left">
                            <div class="widget widget-related-product">
                                <h2 class="widget-title">RELATED PRODUCTS</h2>
                                <ul class="list-product-related">
                                @foreach($related_stock as $item_related_stock)
                                    <li class="clearfix">
                                        <div class="product-related-thumb">
                                            <a href="{!! url('stock-detail',[$item_related_stock->id ]) !!}"><img src="{!! asset('assets/uploads/stocks/'.$item_related_stock->image) !!}" alt="" /></a>
                                        </div>
                                        <div class="product-related-info">
                                            <h3 class="title-product"><a href="#">{!! $item_related_stock->name!!}</a></h3>
                                            <div class="info-price">
                                                <span>${!! $item_related_stock->cost !!}</span><del>$17.96</del>
                                            </div>
                                            <div class="product-rating">
                                                <div class="inner-rating" style="width:100%"></div>
                                                <span>(6s)</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach   
                                </ul>
                            </div>
                            <!-- End Related Product -->
                            <div class="widget widget-adv">
                                <h2 class="title-widget-adv">
                                    <span>Week</span>
                                    <strong>big sale</strong>
                                </h2>
                                <div class="wrap-item">
                                    <div class="item">
                                        <div class="item-widget-adv">
                                            <div class="adv-widget-thumb">
                                                <a href="#"><img src="{{ASSETS_PATH}}images/grid/sl1.jpg" alt="" /></a>
                                            </div>
                                            <div class="adv-widget-info">
                                                <h3>New Collection</h3>
                                                <h2><span>from</span> 40% off</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-widget-adv">
                                            <div class="adv-widget-thumb">
                                                <a href="#"><img src="{{ASSETS_PATH}}images/grid/sl2.jpg" alt="" /></a>
                                            </div>
                                            <div class="adv-widget-info">
                                                <h3>Quality usinesswear </h3>
                                                <h2><span>from</span> 30% off</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-widget-adv">
                                            <div class="adv-widget-thumb">
                                                <a href="#"><img src="{{ASSETS_PATH}}images/grid/sl3.jpg" alt="" /></a>
                                            </div>
                                            <div class="adv-widget-info">
                                                <h3>Hanbags Style 2016</h3>
                                                <h2><span>from</span> 20% off</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Adv -->
                        </div>
                        <!-- End Sidebar Shop -->
                    </div>
                </div>
                </div>
        </div>
        <!-- End Content Shop -->
        
@stop