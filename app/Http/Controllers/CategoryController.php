<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock as Stock;
use App\Http\Requests;
use Gloudemans\Shoppingcart\Facades\Cart;
use DB;
use View;
class CategoryController extends Controller
{
    function index(Request $request,$id){

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
            $stock_cate = DB::table('stocks')->select('id','name','image','cost','discount','category_id')->where('category_id',$id)->get();
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
    function item2(Request $request){
        
         if($request->ajax() && isset($request->brand)) {
            $brand = $request->brand;
            $stocks_brand = DB::table('stocks')->whereIn('category_id', explode(',', $brand ))->get();
            $array = [];
            foreach($stocks_brand as $image){
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
            $view = View::make('layouts.frontend.Render.item2',['stocks_brand'=>$stocks_brand,'imageStock'=>$imageStock]);
            $view = $view->render();
            return json_encode(array('view' => $view));
        }
    }
    function addItemCate($id){
        $product = Stock::find($id); // get product by id
        Cart::add($id, $product->name, 1, $product->cost,['img' => $product->image]);
        return back();
    }
       

}