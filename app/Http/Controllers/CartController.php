<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests;
use App\Models\Stock; 

class CartController extends Controller
{
    function index(){
    	$cartItems = Cart::content();
    	return view("layouts.frontend.partials.cart",['cartItems'=>$cartItems]);
    }
    function addItem($id){
    	$product = Stock::find($id); // get product by id
    	Cart::add($id, $product->name, 1, $product->cost,['img' => $product->image]);
    	return back();
    }
    function destroy($id){
    	Cart::remove($id);
    	return back(); // will keep same page
    }
    function update(Request $request,$id){

    	if ($request->ajax()){
    		$id = $request->get('id');
    		$qty = $request->get('qty');
    		Cart::update($id,$qty);
    		echo "oke";
    	}
    }
    

}
