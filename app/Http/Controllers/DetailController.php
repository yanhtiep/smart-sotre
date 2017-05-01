<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class DetailController extends Controller
{
    function __construct(){

    }
    
    function index($id){

    	$stock_detail = DB::table('stocks')->where('id',$id)->first();
        $imageDetail = DB::table('galleries')->select('id','caption')->where('galleryable_id',$stock_detail->id)->get();
        $stock_cate = DB::table('stocks')->where('category_id',$stock_detail->category_id)->where('id','<>',$id)->get();
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
        $related_stock = DB::table('stocks')->select('id','name','image','cost','discount')->where('id','<>',$id)->orderBy('id','DESC')->take(5)->get();
        return view('layouts.frontend.partials.detail',['stock_detail'=> $stock_detail,'imageDetail'=>$imageDetail,'stock_cate'=>$stock_cate,'imageStock'=>$imageStock,'related_stock'=>$related_stock]);
    }
}
