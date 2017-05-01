<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests;
use App\Models\Stock as Stock;
use App\Models\Users as Users;
use App\Helpers\Utils as Utils;
use App\Models\Profile as Profile;
use App\Models\Social as Social;

use App\Models\Galleries;
use Carbon\Carbon;
use DB;
use View;
class HomeController extends Controller
{

   // private $some_service;
   public function __construct()
    {
        if(Auth::check())
        {
            view()->share('user',Auth::user());
        }
    }

    function index(Request $request){
        $data_view = Stock::orderBy('id','DESC')->get();
        $array = [];
        foreach($data_view as $image){
            $imageStock = DB::table('galleries')->select('id','caption','galleryable_id')->where('galleryable_id',$image->id)->groupBy('galleryable_id')->get();    
            foreach($imageStock as $img){
            $data = array(
                    "id" => $img->galleryable_id,
                    "caption" => $img->caption
                );
              array_push($array,$data);
           }
         }
        $imageStock = array_map("unserialize", array_unique(array_map("serialize", $array)));  
    	return view("index",compact('data_view','imageStock'));
    }
    function search(Request $request){
        $id = $request->id;
        $search_data = $request->search_data;
        if($request->ajax() && isset($request->start)){
            $start = $request->start; // min price value
            $end = $request->end; // max price value
            
            $stock_cate = DB::table('stocks')->select('id','name','image','cost','discount','category_id')->where('category_id',$id)->where('cost','>=',$start)->where('cost','<=',$end)->get(); // we are fetching all products according to price range
            $array = [];
            foreach($stock_cate as $image){
                $imageStock = DB::table('galleries')->select('id','caption','galleryable_id')->where('galleryable_id',$image->id)->groupBy('galleryable_id')->get();    
                foreach($imageStock as $img){
                $data = array(
                        "id" => $img->galleryable_id,
                        "caption" => $img->caption
                    );
                  array_push($array,$data);
               }
             }
            $imageStock = array_map("unserialize", array_unique(array_map("serialize", $array)));
            response()->json($stock_cate); // return to ajax
            return view("layouts.frontend.Render.itemRange",['stock_cate'=>$stock_cate,'imageStock'=>$imageStock]);
        }else{
            $stock_cate = DB::table('stocks')->select('id','name','image','cost','discount','category_id')->where('category_id',$id)->where('name','like',"%$search_data%")->orWhere('description','like',"%$search_data%")->get();
            $array = [];
            foreach($stock_cate as $image){
                $imageStock = DB::table('galleries')->select('id','caption','galleryable_id')->where('galleryable_id',$image->id)->groupBy('galleryable_id')->get();    
                foreach($imageStock as $img){
                $data = array(
                        "id" => $img->galleryable_id,
                        "caption" => $img->caption
                    );
                  array_push($array,$data);
               }
             }
            $imageStock = array_map("unserialize", array_unique(array_map("serialize", $array)));
            return view("layouts.frontend.partials.category",['stock_cate'=>$stock_cate,'imageStock'=>$imageStock]);
        
        
        }
        
    }
    function item(Request $request){
        
         if($request->ajax() && isset($request->brand)) {
            $brand = $request->brand;
            $stocks = DB::table('stocks')->whereIn('category_id', explode(',', $brand ))->get();
            $array = [];
            foreach($stocks as $image){
                $imageStock = DB::table('galleries')->select('id','caption','galleryable_id')->where('galleryable_id',$image->id)->groupBy('galleryable_id')->get();    
                foreach($imageStock as $img){
                $data = array(
                        "id" => $img->galleryable_id,
                        "caption" => $img->caption
                    );
                  array_push($array,$data);
               }
             }
            $imageStock = array_map("unserialize", array_unique(array_map("serialize", $array)));
            $view = View::make('layouts.frontend.Render.item',['stocks'=>$stocks,'imageStock'=>$imageStock]);
            $view = $view->render();
            return json_encode(array('view' => $view));
        }
    }
   function addItemBrand($id){
        $product = Stock::find($id); // get product by id
        Cart::add($id, $product->name, 1, $product->cost,['img' => $product->image]);
        return back();
    }
   function getProByCates(){
        $blogPro = '
<div class="category-home-total">
    <div class="category-home-label">
        <a href="#">
            <img src="/assets/frontEnd/template/images/home1/icon-box1.png" alt="" />
            <span>Fashion</span>
            
        </a>
    </div>
    <!-- End Label -->
    <div class="nav-filter">
        <div class="wrap-item">
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-best.png" alt="" />
                        <span>Best seller</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-view.png" alt="" />
                        <span>Most view</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-special.png" alt="" />
                        <span>Special</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-new.png" alt="" />
                        <span>New arrivals</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-review.png" alt="" />
                        <span>Most reviews</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-sale.png" alt="" />
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
            <li><a href="#">Street Style</a></li>
            <li><a href="#">Designer</a></li>
            <li><a href="#">Dresses</a></li>
            <li><a href="#">Accessories</a></li>
        </ul>
    </div>
    <!-- End List Tab Category -->
    <div class="category-brand-slider">
        <div class="wrap-item">
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="/assets/frontEnd/template/images/home1/pn1.png" alt="" /></a>
                </div>
            </div>
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="/assets/frontEnd/template/images/home1/pn2.png" alt="" /></a>
                </div>
            </div>
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="/assets/frontEnd/template/images/home1/pn3.png" alt="" /></a>
                </div>
            </div>
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="/assets/frontEnd/template/images/home1/pn4.png" alt="" /></a>
                </div>
            </div>
            <div class="item">
                <div class="item-category-brand">
                    <a href="#"><img src="/assets/frontEnd/template/images/home1/pn5.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Category Brand Slider -->
</div>
<div class="banner-home-category">
    <div class="item-adv-simple">
        <a href="#"><img src="/assets/frontEnd/template/images/home1/thumb-box1.png" alt="" /></a>
    </div>
</div>
<div class="featured-product-category">
    <div class="wrap-item">
        <div class="item">
            <div class="item-category-featured-product">
                <div class="product-thumb">
                    <a href="#" class="product-thumb-link">
                        <img class="first-thumb" src="/assets/frontEnd/template/images/photos/extras/11.jpg" alt=""/>
                        <img class="second-thumb" src="/assets/frontEnd/template/images/photos/extras/12.jpg" alt=""/>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="#">Women"s Woolen </a></h3>
                    <div class="info-price">
                        <span>$59.52 </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating"></div>
                        <span>(3s)</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Item -->
        <div class="item">
            <div class="item-category-featured-product">
                <div class="product-thumb">
                    <a href="#" class="product-thumb-link">
                        <img class="first-thumb" src="/assets/frontEnd/template/images/photos/extras/17.jpg" alt=""/>
                        <img class="second-thumb" src="/assets/frontEnd/template/images/photos/extras/16.jpg" alt=""/>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="#">Women"s Woolen </a></h3>
                    <div class="info-price">
                        <span>$59.52 </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating"></div>
                        <span>(3s)</span>
                    </div>
                </div>
                <div class="percent-saleoff">
                    <span><label>15%</label>OFF</span>
                </div>
            </div>
        </div>
        <!-- End Item -->
        <div class="item">
            <div class="item-category-featured-product">
                <div class="product-thumb">
                    <a href="#" class="product-thumb-link">
                        <img class="first-thumb" src="/assets/frontEnd/template/images/photos/extras/18.jpg" alt=""/>
                        <img class="second-thumb" src="/assets/frontEnd/template/images/photos/extras/19.jpg" alt=""/>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="#">Women"s Woolen </a></h3>
                    <div class="info-price">
                        <span>$59.52 </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating" style="width:100%"></div>
                        <span>(3s)</span>
                    </div>
                </div>
                <div class="percent-saleoff">
                    <span><label>35%</label>OFF</span>
                </div>
            </div>
        </div>
        <!-- End Item -->
        <div class="item">
            <div class="item-category-featured-product">
                <div class="product-thumb">
                    <a href="#" class="product-thumb-link">
                        <img class="first-thumb" src="/assets/frontEnd/template/images/photos/extras/1.jpg" alt=""/>
                        <img class="second-thumb" src="/assets/frontEnd/template/images/photos/extras/2.jpg" alt=""/>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="#">Women"s Woolen </a></h3>
                    <div class="info-price">
                        <span>$59.52 </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating"></div>
                        <span>(3s)</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Item -->
        <div class="item">
            <div class="item-category-featured-product">
                <div class="product-thumb">
                    <a href="#" class="product-thumb-link">
                        <img class="first-thumb" src="/assets/frontEnd/template/images/photos/extras/3.jpg" alt=""/>
                        <img class="second-thumb" src="/assets/frontEnd/template/images/photos/extras/4.jpg" alt=""/>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="#">Women"s Woolen </a></h3>
                    <div class="info-price">
                        <span>$59.52 </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating"></div>
                        <span>(3s)</span>
                    </div>
                </div>
                <div class="percent-saleoff">
                    <span><label>15%</label>OFF</span>
                </div>
            </div>
        </div>
        <!-- End Item -->
        <div class="item">
            <div class="item-category-featured-product">
                <div class="product-thumb">
                    <a href="#" class="product-thumb-link">
                        <img class="first-thumb" src="/assets/frontEnd/template/images/photos/extras/22.jpg" alt=""/>
                        <img class="second-thumb" src="/assets/frontEnd/template/images/photos/extras/23.jpg" alt=""/>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="#">Women"s Woolen </a></h3>
                    <div class="info-price">
                        <span>$59.52 </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating" style="width:100%"></div>
                        <span>(3s)</span>
                    </div>
                </div>
                <div class="percent-saleoff">
                    <span><label>35%</label>OFF</span>
                </div>
            </div>
        </div>
        <!-- End Item -->
    </div>
    <!-- ------------------------------------------------------------ -->
    <div style="clear:both;"></div>
    <div class="ads-blog row" style="padding:0;margin:0;">
        <div class="col-md-6 col-sm-6 col-xs-12" style="padding:0;">
            <div class="item-adv-simple">
                <a href="#"><img src="/assets/frontEnd/template/images/home1/ad3.png" alt="" /></a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12" style="padding:0;">
            <div class="item-adv-simple">
                <a href="#"><img src="/assets/frontEnd/template/images/home1/ad4.png" alt="" /></a>
            </div>
        </div>
    </div>
    <div class="category-filter-slider">
        <div class="wrap-item">
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-best.png" alt="" />
                        <span>Best seller</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-view.png" alt="" />
                        <span>Most view</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-special.png" alt="" />
                        <span>Special</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-new.png" alt="" />
                        <span>New arrivals</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-review.png" alt="" />
                        <span>Most reviews</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <div class="item-filter">
                    <a href="#">
                        <img src="/assets/frontEnd/template/images/home1/icon-sale.png" alt="" />
                        <span>Sale</span>
                    </a>
                </div>
            </div>
            <!-- End Item -->
        </div>
    </div>
</div>';
$script = '<script type="text/javascript" src="/assets/frontEnd/template/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/jquery-ui.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/owl.carousel.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/jquery.jcarousellite.min.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/TimeCircles.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/slideshow/jquery.themepunch.revolution.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/slideshow/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/jquery.appear.js"></script>
<script type="text/javascript" src="/assets/frontEnd/template/js/theme.js"></script>';

$proItem = '<div class="item col-md-4">
            <div class="item-category-featured-product">
                <div class="product-thumb">
                    <a href="#" class="product-thumb-link">
                        <img class="first-thumb" src="/assets/frontEnd/template/images/photos/extras/17.jpg" alt=""/>
                        <img class="second-thumb" src="/assets/frontEnd/template/images/photos/extras/16.jpg" alt=""/>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="#">Women"s Woolen </a></h3>
                    <div class="info-price">
                        <span>$59.52 </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating"></div>
                        <span>(3s)</span>
                    </div>
                </div>
                <div class="percent-saleoff">
                    <span><label>15%</label>OFF</span>
                </div>
            </div>
        </div>
        <!-- End Item -->
        <div class="item col-md-4">
            <div class="item-category-featured-product">
                <div class="product-thumb">
                    <a href="#" class="product-thumb-link">
                        <img class="first-thumb" src="/assets/frontEnd/template/images/photos/extras/18.jpg" alt=""/>
                        <img class="second-thumb" src="/assets/frontEnd/template/images/photos/extras/19.jpg" alt=""/>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="#">Women"s Woolen </a></h3>
                    <div class="info-price">
                        <span>$59.52 </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating" style="width:100%"></div>
                        <span>(3s)</span>
                    </div>
                </div>
                <div class="percent-saleoff">
                    <span><label>35%</label>OFF</span>
                </div>
            </div>
        </div>
        <!-- End Item -->
        <div class="item col-md-4">
            <div class="item-category-featured-product">
                <div class="product-thumb">
                    <a href="#" class="product-thumb-link">
                        <img class="first-thumb" src="/assets/frontEnd/template/images/photos/extras/1.jpg" alt=""/>
                        <img class="second-thumb" src="/assets/frontEnd/template/images/photos/extras/2.jpg" alt=""/>
                    </a>
                    <div class="product-info-cart">
                        <div class="product-extra-link">
                            <a href="#" class="wishlist-link"><i class="fa fa-heart-o"></i></a>
                            <a href="#" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                            <a href="#" class="quickview-link"><i class="fa fa-search"></i></a>
                        </div>
                        <a href="#" class="addcart-link"><i class="fa fa-shopping-basket"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="title-product"><a href="#">Women"s Woolen </a></h3>
                    <div class="info-price">
                        <span>$59.52 </span>
                        <del>$17.96</del>
                    </div>
                    <div class="product-rating">
                        <div class="inner-rating"></div>
                        <span>(3s)</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Item -->';
    return $blogPro;
    }
}