<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Galleries;
use DB;
use View;
class StockController extends Controller
{
    function index(){
    	return view("layouts.frontend.partials.stock");
    }
 
}
