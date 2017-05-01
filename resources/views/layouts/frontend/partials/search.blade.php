@extends('layouts.frontend.layout')
@section('dropdown-cls') hidden-category-dropdown @stop
@section('content')
<script>
    $(function(){
        //========= brand function category ==========
       $('.try').click(function(){
           var brand = [];
           $('.try').each(function(){
                if($(this).is(":checked")){
                    
                    brand.push($(this).val());
                }
           });
             Finalbrand = brand.toString();
                $.ajax({
                url: '{{route("item2")}}',
                type: 'get',
                dataType: 'json',
                data: "brand=" +  Finalbrand,
                success: function (response) {
                    console.log(response);
                    $('.brandimgCate').html(response.view);
                }
               
            });
       });
            
    });
</script>
<div class="content-shop left-sidebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-12 main-content">
                        <div class="main-content-shop">
                            <div class="banner-shop-slider">
                                <div class="wrap-item">
                                    <div class="item">
                                        <div class="item-shop-slider">
                                            <div class="shop-slider-thumb">
                                                <a href="#"><img src="{{ASSETS_PATH}}images/grid/bn1.jpg" alt="" /></a>
                                            </div>
                                            <div class="shop-slider-info">
                                                <h3>jewelry-bracelets</h3>
                                                <h2>exta 35% off </h2>
                                                <a href="#" class="shop-now">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item -->
                                    <div class="item">
                                        <div class="item-shop-slider">
                                            <div class="shop-slider-thumb">
                                                <a href="#"><img src="{{ASSETS_PATH}}images/grid/bn2.jpg" alt="" /></a>
                                            </div>
                                            <div class="shop-slider-info">
                                                <h3>jewelry-bracelets</h3>
                                                <h2>exta 35% off </h2>
                                                <a href="#" class="shop-now">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item -->
                                    <div class="item">
                                        <div class="item-shop-slider">
                                            <div class="shop-slider-thumb">
                                                <a href="#"><img src="{{ASSETS_PATH}}images/grid/bn3.jpg" alt="" /></a>
                                            </div>
                                            <div class="shop-slider-info">
                                                <h3>jewelry-bracelets</h3>
                                                <h2>exta 35% off </h2>
                                                <a href="#" class="shop-now">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item -->
                                    <div class="item">
                                        <div class="item-shop-slider">
                                            <div class="shop-slider-thumb">
                                                <a href="#"><img src="{{ASSETS_PATH}}images/grid/bn4.jpg" alt="" /></a>
                                            </div>
                                            <div class="shop-slider-info">
                                                <h3>jewelry-bracelets</h3>
                                                <h2>exta 35% off </h2>
                                                <a href="#" class="shop-now">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item -->
                                    <div class="item">
                                        <div class="item-shop-slider">
                                            <div class="shop-slider-thumb">
                                                <a href="#"><img src="{{ASSETS_PATH}}images/grid/bn5.jpg" alt="" /></a>
                                            </div>
                                            <div class="shop-slider-info">
                                                <h3>jewelry-bracelets</h3>
                                                <h2>exta 35% off </h2>
                                                <a href="#" class="shop-now">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item -->
                                </div>
                            </div>
                            <!-- End Banner Slider -->
                            <div class="list-shop-cat">
                                <ul>
                                    <li><a href="#">Women <span>15</span></a></li>
                                    <li><a href="#">Men <span>10</span></a></li>
                                    <li><a href="#">Kids & Baby <span>4</span></a></li>
                                    <li><a href="#">Bags & Shoes <span>3</span></a></li>
                                    <li><a href="#">Jewelry & Watches <span>8</span></a></li>
                                    <li><a href="#">Electronics <span>5</span></a></li>
                                </ul>
                            </div>
                            <!-- End List Shop Cat -->
                            <div class="shop-tab-product">
                                <div class="shop-tab-title">
                                    <h2>Maxi dresses</h2>
                                    <ul class="shop-tab-select">
                                        <li class="active"><a href="#product-grid" class="grid-tab" data-toggle="tab"></a></li>
                                        <li><a href="#product-list" class="list-tab" data-toggle="tab"></a></li>
                                    </ul>
                                </div>
                                <div class="tab-content ">
                                    <div role="tabpanel" class="tab-pane fade in active " id="product-grid">
                                        <ul class="row product-grid auto-clear brandimgCate" id="rangeStock">
                                        @foreach ($stock_cate as $item_stock_cate)
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                                                <div class="item-product" >
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
                                                                <a class="quickview-link fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></a>
                                                            </div>
                                                            <a class="addcart-link" href="#"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
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
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="sort-pagi-bar">
                                                    <div class="product-order">
                                                        <a href="#" class="product-order-toggle">Position</a>
                                                        <ul class="product-order-list">
                                                            <li><a href="#">Name</a></li>
                                                            <li><a href="#">Price</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-per-page">
                                                        <a href="#" class="per-page-toggle">show <span>6</span></a>
                                                        <ul class="per-page-list">
                                                            <li><a href="#">6</a></li>
                                                            <li><a href="#">9</a></li>
                                                            <li><a href="#">12</a></li>
                                                            <li><a href="#">18</a></li>
                                                            <li><a href="#">24</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-pagi-nav">
                                                        <a href="#" class="active">1</a>
                                                        <a href="#">2</a>
                                                        <a href="#">3</a>
                                                        <a href="#" class="next">next <i class="fa fa-angle-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Sort Pagibar -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="product-list">
                                        <ul class="product-list">
                                            <li>
                                                <div class="item-product">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="product-thumb">
                                                                <a class="product-thumb-link" href="detail.html">
                                                                    <img class="first-thumb" alt="" src="{{ASSETS_PATH}}images/photos/extras/16.jpg">
                                                                    <img class="second-thumb" alt="" src="{{ASSETS_PATH}}images/photos/extras/19.jpg">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                                            <div class="product-info">
                                                                <h3 class="title-product"><a href="#">Burberry Pink & black</a></h3>
                                                                <div class="info-price">
                                                                    <span>$59.52</span><del>$17.96</del>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <div class="inner-rating" style="width:100%"></div>
                                                                    <span>(6s)</span>
                                                                </div>
                                                                <div class="product-code">
                                                                    <label>Item Code: </label> <span>#12980496023</span>
                                                                </div>
                                                                <div class="product-stock">
                                                                    <label>Availability: </label> <span>In stock</span>
                                                                </div>
                                                                <div class="product-info-cart">
                                                                    <a class="addcart-link" href="#"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                                                                    <div class="product-extra-link">
                                                                        <a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
                                                                        <a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
                                                                        <a class="quickview-link fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt condimentum felis, et tempor neque rhoncus ac. Proin elementum, felis id placerat dapibus, purus ipsum lobortis tellus, ut vehicula nisl metus eget arcu. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="item-product">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="product-thumb">
                                                                <a class="product-thumb-link" href="detail.html">
                                                                    <img class="first-thumb" alt="" src="{{ASSETS_PATH}}images/photos/extras/15.jpg">
                                                                    <img class="second-thumb" alt="" src="{{ASSETS_PATH}}images/photos/extras/20.jpg">
                                                                </a>
                                                                <div class="percent-saleoff">
                                                                    <span><label>55%</label> OFF</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                                            <div class="product-info">
                                                                <h3 class="title-product"><a href="#">Burberry Pink & black</a></h3>
                                                                <div class="info-price">
                                                                    <span>$59.52</span><del>$17.96</del>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <div class="inner-rating" style="width:100%"></div>
                                                                    <span>(6s)</span>
                                                                </div>
                                                                <div class="product-code">
                                                                    <label>Item Code: </label> <span>#12980496023</span>
                                                                </div>
                                                                <div class="product-stock">
                                                                    <label>Availability: </label> <span>In stock</span>
                                                                </div>
                                                                <div class="product-info-cart">
                                                                    <a class="addcart-link" href="#"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                                                                    <div class="product-extra-link">
                                                                        <a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
                                                                        <a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
                                                                        <a class="quickview-link fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt condimentum felis, et tempor neque rhoncus ac. Proin elementum, felis id placerat dapibus, purus ipsum lobortis tellus, ut vehicula nisl metus eget arcu. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="item-product">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="product-thumb">
                                                                <a class="product-thumb-link" href="detail.html">
                                                                    <img class="first-thumb" alt="" src="{{ASSETS_PATH}}images/photos/extras/17.jpg">
                                                                    <img class="second-thumb" alt="" src="{{ASSETS_PATH}}images/photos/extras/21.jpg">
                                                                </a>
                                                                <div class="percent-saleoff">
                                                                    <span><label>55%</label> OFF</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                                            <div class="product-info">
                                                                <h3 class="title-product"><a href="#">Burberry Pink & black</a></h3>
                                                                <div class="info-price">
                                                                    <span>$59.52</span><del>$17.96</del>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <div class="inner-rating" style="width:100%"></div>
                                                                    <span>(6s)</span>
                                                                </div>
                                                                <div class="product-code">
                                                                    <label>Item Code: </label> <span>#12980496023</span>
                                                                </div>
                                                                <div class="product-stock">
                                                                    <label>Availability: </label> <span>In stock</span>
                                                                </div>
                                                                <div class="product-info-cart">
                                                                    <a class="addcart-link" href="#"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                                                                    <div class="product-extra-link">
                                                                        <a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
                                                                        <a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
                                                                        <a class="quickview-link fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt condimentum felis, et tempor neque rhoncus ac. Proin elementum, felis id placerat dapibus, purus ipsum lobortis tellus, ut vehicula nisl metus eget arcu. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="item-product">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="product-thumb">
                                                                <a class="product-thumb-link" href="detail.html">
                                                                    <img class="first-thumb" alt="" src="{{ASSETS_PATH}}images/photos/extras/18.jpg">
                                                                    <img class="second-thumb" alt="" src="{{ASSETS_PATH}}images/photos/extras/22.jpg">
                                                                </a>
                                                                <div class="percent-saleoff">
                                                                    <span><label>55%</label> OFF</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                                            <div class="product-info">
                                                                <h3 class="title-product"><a href="#">Burberry Pink & black</a></h3>
                                                                <div class="info-price">
                                                                    <span>$59.52</span><del>$17.96</del>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <div class="inner-rating" style="width:100%"></div>
                                                                    <span>(6s)</span>
                                                                </div>
                                                                <div class="product-code">
                                                                    <label>Item Code: </label> <span>#12980496023</span>
                                                                </div>
                                                                <div class="product-stock">
                                                                    <label>Availability: </label> <span>In stock</span>
                                                                </div>
                                                                <div class="product-info-cart">
                                                                    <a class="addcart-link" href="#"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                                                                    <div class="product-extra-link">
                                                                        <a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
                                                                        <a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
                                                                        <a class="quickview-link fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt condimentum felis, et tempor neque rhoncus ac. Proin elementum, felis id placerat dapibus, purus ipsum lobortis tellus, ut vehicula nisl metus eget arcu. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="sort-pagi-bar">
                                                    <div class="product-order">
                                                        <a href="#" class="product-order-toggle">Position</a>
                                                        <ul class="product-order-list">
                                                            <li><a href="#">Name</a></li>
                                                            <li><a href="#">Price</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-per-page">
                                                        <a href="#" class="per-page-toggle">show <span>6</span></a>
                                                        <ul class="per-page-list">
                                                            <li><a href="#">6</a></li>
                                                            <li><a href="#">9</a></li>
                                                            <li><a href="#">12</a></li>
                                                            <li><a href="#">18</a></li>
                                                            <li><a href="#">24</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-pagi-nav">
                                                        <a href="#" class="active">1</a>
                                                        <a href="#">2</a>
                                                        <a href="#">3</a>
                                                        <a href="#" class="next">next <i class="fa fa-angle-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Sort Pagibar -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Shop Tab -->
                        </div>
                        <!-- End Main Content Shop -->
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                        <div class="sidebar-shop sidebar-left">
                            <div class="widget widget-filter">
                                <div class="box-filter category-filter">
                                    <h2 class="widget-title">CATEGORY</h2>
                                    <ul>
                                    <?php $categories = DB::table('categories')->take(5)->orderBy('name','ASC')->get(); ?>
                                            @foreach($categories as $cate)
                                                 <li><input class="try" type="checkbox" id="cateId" value="{{$cate->id}}">
                                                 <span class="pull-right">({!! App\Models\Stock::where('category_id',$cate->id)->count() !!}) </span>{{ $cate->name}}</li>
                                            @endforeach
                                    </ul>
                                </div>
                                <!-- End Category -->
                                <div class="box-filter price-filter">
                                    <h2 class="widget-title">price</h2>
                                    <div class="inner-price-filter">
                                        <ul>
                                            <li><a href="#">$ Under-10 (29)</a></li>
                                            <li><a href="#">$ 10-20 (29)</a></li>
                                            <li><a href="#">$ 20-40 (29)</a></li>
                                            <li><a href="#">$ 40-50 (29)</a></li>
                                            <li><a href="#">$ 50-80 (29)</a></li>
                                        </ul>
                                        <div class="range-filter">
                                            <label>$</label>
                                           <input type="text" size="2" id="amount_start" name="start_price" value="0"> - 
                                           <input type="text" size="2" id="amount_end" name="end_price" value="500">
                                             <button class="btn-filter" onclick="send()">Filter</button>
                                            <div id="slider-range"></div>
                                            <div id="showDiv"><div id="showPrice"></div></div>
                                        </div>  
                                    </div>
                                </div>
                                <!-- End Price -->
                                <div class="box-filter color-filter">
                                    <h2 class="widget-title">Color</h2>
                                    <div class="list-color-filter">
                                        <a href="#" style="background-color:#ffffff"></a>
                                        <a href="#" style="background-color:#e66054"></a>
                                        <a href="#" style="background-color:#d0b7cc"></a>
                                        <a href="#" style="background-color:#107a8e"></a>
                                        <a href="#" style="background-color:#b9cad2"></a>
                                        <a href="#" style="background-color:#a7bc93"></a>
                                        <a href="#" style="background-color:#d3b627"></a>
                                        <a href="#" style="background-color:#b4b3ae"></a>
                                        <a href="#" style="background-color:#502006"></a>
                                        <a href="#" style="background-color:#311e21"></a>
                                        <a href="#" style="background-color:#e6b3af"></a>
                                        <a href="#" style="background-color:#f3d213"></a>
                                        <a href="#" style="background-color:#bd0316"></a>
                                        <a href="#" style="background-color:#cd0c20"></a>
                                    </div>
                                </div>
                                <!-- End Color -->
                                <div class="box-filter manufacturer-filter">
                                    <h2 class="widget-title">Manufacturers</h2>
                                    <ul>
                                        <li><a href="#">D&D Fashion</a></li>
                                        <li><a href="#">London Fashion</a></li>
                                        <li><a href="#">Milanno Fashion</a></li>
                                        <li><a href="#">Gucci</a></li>
                                        <li><a href="#">CK Fashion</a></li>
                                    </ul>
                                </div>
                                <!-- End Manufacturers -->
                            </div>
                            <!-- End Filter -->
                            <div class="widget widget-vote">
                                <h2 class="widget-title">COMMUNITY POLL</h2>
                                <p>What is your favorite color</p>
                                <ul>
                                    <li><a href="#">Green</a></li>
                                    <li><a href="#" class="active">Red</a></li>
                                    <li><a href="#">Black</a></li>
                                    <li><a href="#">Magenta</a></li>
                                </ul>
                                <button>Vote</button>
                            </div>
                            <!-- End Vote -->
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
 <script>
    // ========================= click filter search product function
     function send(){
        var start = $('#amount_start').val();
        var end = $('#amount_end').val();
        $.ajax({
           type: 'get',
           url: 'category',
           data: "start=" +start + "& end=" + end,
           
           success: function(response){
             console.log(response)
             $('#rangeStock').html(response);
           }
        });
       }
       
 </script>     
@stop
