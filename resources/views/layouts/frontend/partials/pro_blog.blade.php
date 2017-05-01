<?php 
    $users = array("1","2","3","4","5"); 
    $colors = array('red', 'green', 'blue', 'pink', 'yellow');
    $images = array('/assets/frontEnd/template/images/home2/ad4.png', 
                    '/assets/frontEnd/template/images/home1/thumb-box5.png', 
                    '/assets/frontEnd/template/images/home1/thumb-box4.png', 
                    '/assets/frontEnd/template/images/home1/thumb-box3.png', 
                    '/assets/frontEnd/template/images/home1/thumb-box2.png');
    $i = 0;
?>
@foreach ($users as $user)
<div class="clearfix category-product-featured <?php echo $colors[$i].'-box'; ?>" rel="1">
   <div class="category-home-total" style="width: 19%;">
   <?php 
        $fashion_level_1 = DB::table('categories')->where('parent_id',0)->take(1)->get();
    ?>
    @foreach($fashion_level_1 as $item_level_1)
    <div class="category-home-label">
        <a href="#">
            <img src="{!! asset('assets/uploads/category/'.$item_level_1->image) !!}" alt="" />
            <span>{!! ucwords($item_level_1->name) !!}</span>
        </a>
    </div>
    <!-- End Label -->
    <div class="nav-filter">
        <div class="wrap-item">
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-best.png" alt="" />
                        <span>Best seller</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-view.png" alt="" />
                        <span>Most view</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-special.png" alt="" />
                        <span>Special</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-new.png" alt="" />
                        <span>New arrivals</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-review.png" alt="" />
                        <span>Most reviews</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-sale.png" alt="" />
                        <span>Sale</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
        </div>
    </div>
    <!-- End Filter -->

    <div class="list-child-category">
        <ul>
        <?php 
            $menu_level_2 = DB::table('categories')->where('parent_id',$item_level_1->id)->get();
        ?>
        @foreach($menu_level_2 as $item_level_2)
            <?php 
                $menu_level_3 = DB::table('categories')->where('parent_id',$item_level_2->id)->get();
            ?>
            @foreach($menu_level_3 as $item_level_3)
            <li class="try" value="{!! $item_level_3->id !!}">
                <span class="pull-right">{!! App\Models\Stock::where('category_id',$item_level_3->id)->count() !!}</span>
               <a> {!! ucwords($item_level_3->name) !!}</a>
            </li>
            @endforeach
        @endforeach
        </ul>
    </div>
    <!-- End List Tab Category -->
    <div class="category-brand-slider">
        <div class="wrap-item">
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="{{ASSETS_PATH}}images/home1/pn1.png" alt="" /></a>
                </div>
            </div>
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="{{ASSETS_PATH}}images/home1/pn2.png" alt="" /></a>
                </div>
            </div>
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="{{ASSETS_PATH}}images/home1/pn3.png" alt="" /></a>
                </div>
            </div>
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="{{ASSETS_PATH}}images/home1/pn4.png" alt="" /></a>
                </div>
            </div>
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="{{ASSETS_PATH}}images/home1/pn5.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Category Brand Slider -->
</div>

<div class="banner-home-category">
    <div class="item-adv-simple">
        <a href="#"><img src="{{$images[$i]}}" alt="" /></a>
    </div>
</div>
<div class="featured-product-category" >
    <div class="wrap-item brandimg" >
        <!-- End Item -->
         @foreach($data_view as $item)
        <div class="item" >
            <div class="item-category-featured-product">
           
                <div class="product-thumb">
                    <a href="{!! url('stock-detail',[$item['id'] ]) !!}" class="product-thumb-link">

                        <img class="first-thumb" src="{!! asset('assets/uploads/stocks/'.$item->image) !!}" alt=""/>
                        @foreach($imageStock as $item_detail)
                        @if($item->id == $item_detail['id'])
                        <img class="second-thumb" src="{{ asset('assets/uploads/stocks/alias/'.$item_detail['caption']) }}" alt=""/>
                        @endif
                        @endforeach
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="{{url('/cart/addItem')}}/<?php echo $item->id; ?>" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="/detail">{!! $item['name'] !!} </a></h3>
                    <div class="info-price">
                        <span>${!! $item['cost'] !!} </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating"></div>
                        <span>(3s)</span>
                    </div>
                </div>

                @if( $item['discount']  == 40) 
                    <div class="percent-saleoff">
                        <span><label>{!! $item['discount'] !!}%</label>OFF</span>
                    </div>
                
                @endif
                @if( $item['discount']  == 30) 
                    <div class="percent-saleoff">
                        <span><label>{!! $item['discount'] !!}%</label>OFF</span>
                    </div>
                
                @endif
                @if( $item['discount']  == 15) 
                    <div class="percent-saleoff">
                        <span><label>{!! $item['discount'] !!}%</label>OFF</span>
                    </div>
                
                @endif
                @if( $item['discount']  == 5) 
                    <div class="percent-saleoff">
                        <span><label>{!! $item['discount'] !!}%</label>OFF</span>
                    </div>
                
                @endif
                
            </div>
        </div>
       @endforeach
    </div>
    <!-- ------------------------------------------------------------ -->
    <div style="clear:both;"></div>
    <div class="ads-blog row" style="padding:0;margin:0;">
        <div class="col-md-6 col-sm-6 col-xs-12" style="padding:0;">
            <div class="item-adv-simple">
                <a href="#"><img src="{{ASSETS_PATH}}images/home1/ad3.png" alt="" /></a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12" style="padding:0;">
            <div class="item-adv-simple">
                <a href="#"><img src="{{ASSETS_PATH}}images/home1/ad4.png" alt="" /></a>
            </div>
        </div>
    </div>
    <div class="category-filter-slider">
        <div class="wrap-item">
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-best.png" alt="" />
                        <span>Best seller</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-view.png" alt="" />
                        <span>Most view</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-special.png" alt="" />
                        <span>Special</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-new.png" alt="" />
                        <span>New arrivals</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-review.png" alt="" />
                        <span>Most reviews</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="{{ASSETS_PATH}}images/home1/icon-sale.png" alt="" />
                        <span>Sale</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
        </div>
    </div>
</div> 
 @endforeach
</div>
<?php $i++; ?>
@endforeach

<script>
    $(function(){
       $('.try').click(function(){
           var brand = [];
                brand.push($(this).val());
             Finalbrand = brand.toString();
                 
                $.ajax({
                url: '{{route("item")}}',
                type: 'get',
                dataType: 'json',
                data: "brand=" +  Finalbrand,
                success: function (response) {
                    console.log(response);
                    $('.brandimg').html(response.view);
                }
               
            });
       });
       
    });
</script>