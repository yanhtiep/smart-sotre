@extends('layouts.backend.layout')
@section('content')

	<div class="page-title">
		<h3 class="title">
			Setup
		</h3>
	</div>
	 <div class="col-md-12">
        <div class="panel panel-default">
             <div class="row" id="row-form">
                <div class="card-panel">
                	<ul class="nav nav-tabs"> 
                        <li class="active"> 
                            <a href="#home" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                <span class="hidden-xs">Country</span> 
                            </a> 
                        </li> 
                        <li class=""> 
                            <a href="#province" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                <span class="hidden-xs">Province</span> 
                            </a> 
                        </li> 
                        <li class=""> 
                            <a href="#payment" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                <span class="hidden-xs">Payment</span> 
                            </a> 
                        </li> 
                        <li> 
                            <a href="#btype" data-toggle="tab" aria-expanded="true"> 
                                <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                <span class="hidden-xs">Busines type</span> 
                            </a> 
                        </li> 
                         <li>
                        	<a href="#staff" data-toggle="tab" aria-expanded="true">
	                        	<span class="visible-xs"><i class="fa fa-cog"></i></span> 
	                        	<span class="hidden-x">Staff Range</span>
                        	</a>
                        </li>
                        <li>
                        	<a href="#revenue" data-toggle="tab" aria-expanded="true">
	                        	<span class="visible-xs"><i class="fa fa-cog"></i></span> 
	                        	<span class="hidden-x">Revenue Range</span>
                        	</a>
                        </li>
                        <li>
                        	<a href="#condiction" data-toggle="tab" aria-expanded="true">
	                        	<span class="visible-xs"><i class="fa fa-cog"></i></span> 
	                        	<span class="hidden-x">Product Condition</span>
                        	</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                    	<div class="tab-pane active" id="home"> 
                            <div> 
                                <p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted. </p> 
                                <p>Fulfilled direction use continual set him propriety continued. Saw met applauded favourite deficient engrossed concealed and her. Concluded boy perpetual old supposing. Farther related bed and passage comfort civilly. Dashwoods see frankness objection abilities the. As hastened oh produced prospect formerly up am. Placing forming nay looking old married few has. Margaret disposed add screened rendered six say his striking confined. </p> 
                            </div> 
                        </div>
                        <div class="tab-pane" id="province">
                        	prvince
                        </div>
                        <div class="tab-pane" id="payment">
                        	payment method
                        </div>
                        <div class="tab-pane" id="btype">
                        	businses type
                        </div>
                        <div class="tab-pane" id="staff">
                        	staff
                        </div>
                        <div class="tab-pane" id="revenue">
                        	Revenue
                        </div>
                        <div class="tab-pane" id="condiction">
                        	product condiction
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop