@extends('layouts.backend.layout')
@section('content')
<style>
	.img_stocks{ width: 190px; height: 200px; margin-bottom: 20px; }
	.icon_del{position: relative;top:-92px;left: -40px;}
    .img_current{width: 50px;}
    .img_anhphu{width: 50px;margin-bottom: 20px}
    /*.icon_del{position: relative;top:-75px;left: -30px;}*/
    #insert{margin-top: 20px;}
</style>
<div id="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-md-6">
                <h4 class="breadcrumbs-title">Stock management</h4>
                <br/>
            </div>
        </div>
    </div>
<div class="row" id="rowAddStock">
        <div class="col-md-12">
            <div class="panel panel-default" style="box-shadow:none">
                <h4 class="header2" id="form_create_category">Create Product</h4>
                <div class="row">
                {!! Form::open(array('route'=>array('api.edit.stock',$info['id']),'method'=>'patch','enctype'=>'multipart/form-data','id'=>'form-edit-stock','name'=>'frmEditStock')) !!}
                    {{-- <form id="form-add-stock" enctype="multipart/form-data" name="frmEditStock"> --}}
				    <div class="col-lg-7" style="padding-bottom:120px">
				        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				        <input type="hidden" name="add" id="add" class="add" value="add" />
				            <div class="form-group">
				                <label>Category Parent</label>
				                <select class="form-control" name="sltParent">
				                    <option value="">Please Choose Category</option>
				                   	<?php menuStore ($cate,0,$str="---|",$info["category_id"]); ?>
				                </select>
				             </div>
                            <div class="row">
    							<div class="form-group col-md-6">
    			                	<label>Name</label>
    			                	<input class="form-control" name="txtStockName" placeholder="Please Enter Name" value="{!! old('txtStockName',isset($info) ? $info['name'] : null) !!}" />
    			            	</div>
                                <div class="form-group col-md-6">
                                    <label>Cost</label>
                                    <input class="form-control" name="txtCost" placeholder="Please Enter Cost" value="{!! old('txtCost',isset($info) ? $info['cost'] : null) !!}" />
                                </div>
    				            
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Stock code</label>
                                    <input class="form-control" name="txtStockcode" placeholder="Please Enter Stock code" value="{!! old('txtStockcode',isset($info) ? $info['stock_code'] : null) !!}" />
                                </div>
    				            <div class="form-group col-md-6">
    				                <label>Quote code</label>
    				                <input class="form-control" name="txtQuotecode" placeholder="Please Enter Quote code" value="{!! old('txtQuotecode',isset($info) ? $info['quote_code'] : null) !!}" />
    				            </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Min order allow</label>
                                    <input class="form-control" name="txtMinorder" placeholder="Please Enter Min Order " value="{!! old('txtMinorder',isset($info) ? $info['min_order_allow'] : null) !!}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Max order allow</label>
                                    <input class="form-control" name="txtMaxorder" placeholder="Please Enter Max Order" value="{!! old('txtMaxorder',isset($info) ? $info['max_order_allow'] : null) !!}" />
                                </div>
                            </div>
                            <div class="row">
    				            <div class="form-group col-md-6">
    				                <label>Quantity</label>
    				                <input class="form-control" autocomplete="off" Min="1" Max="30" name="txtQuantity" placeholder="Please Enter Quantity" value="{!! old('txtQuantity',isset($info) ? $info['qty'] : null) !!}" />
    				            </div>
    				            <div class="form-group col-md-6">
    				                <label>Reorder Quantity</label>
    				                <input class="form-control" autocomplete="off" Min="1" Max="30" name="txtReorderQuantity" placeholder="Please Enter Reorder Quantity" value="{!! old('txtReorderQuantity',isset($info) ? $info['reorder_qty'] : null) !!}" />
    				            </div>
                            </div>
                            <div class="row">
    				           <div class="form-group col-md-6">
                                        <label>Meta Keywords</label>
                                        <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords',isset($info) ? $info['meta_keyword'] : null) !!}" />
                                    </div> 				      
    				            <div class="form-group col-md-6">
    				            	<label>Discount</label>
    		                        <select class="form-control" name="sldiscount">
    		                          <option value="" disabled selected class="discount">Discount</option>
    		                          <option value="5">5%</option>
    		                          <option value="15">15%</option>
    		                          <option value="30">30%</option>
    		                          <option value="40">40%</option>
    		                        </select>		                        
    		                    </div>
                            </div>
                            <div class="row">
    		                    <div class="form-group col-md-6">
    				                <label>Rate </label>
    				                <input class="form-control" name="txtRate" placeholder="Please Enter Rate" value="{!! old('txtRate',isset($info) ? $info['rating_num'] : null) !!}" />
    				            </div>
    				            <div class="form-group col-md-6">
    				                <label>Review Number </label>
    				                <input class="form-control" name="txtReview" placeholder="Review number" value="{!! old('txtReview',isset($info) ? $info['review_num'] : null) !!}" />
    				            </div>
                            </div>
                            <div class="row">
    				            <div class="form-group col-md-6">
                                    <label>Date</label>
                                    <input class="form-control" id="txtdate" name="txtdate"
                                    data-date-format="yyyy/mm/dd/" placeholder="mm/dd/yyyy" type="text" value="{!! old('txtdate',isset($info) ? $info['expired_date'] : null) !!}">
                                </div>
    				           <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <div class="">
                                    <label class="radio-inline">
                                        <input name="rdoStatus" value="1" type="radio" 
                                        @if($info['status'] == "1")
                                            checked 
                                        @endif
                                        >Visible
                                    </label>
                                    <label class="radio-inline">
                                        <input name="rdoStatus" value="0" type="radio" 
                                        @if($info['status'] == "0")
                                            checked 
                                        @endif
                                        >Invisible
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Images Current</label>
                                <img class="img_current" src="{!! asset('assets/uploads/stocks/'.$info['image']) !!}" />
                                <input type="hidden" name="img_current" value="{!! $info['image'] !!}" />
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
                            </div>				            
							<div class="form-group">
				                <label>Description</label>
				                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($info) ? $info['description'] : null) !!}</textarea>
				            </div>
				            
				            <button  type="submit" class="btn btn-default" id="refresh">Update</button>
				            <button type="reset" class="btn btn-default">Reset</button>
				        
				    </div>
				    <div class="col-md-1"></div>
				    <div class="col-md-4">
				    @foreach($stock_img as $key => $item)
			            <div class="form-group" id="{!! $key !!}">
			                <img class="img_stocks" src="{!! asset('assets/uploads/stocks/alias/'.$item['caption']) !!}" idImage="{!! $item['id'] !!}" id="{!! $key !!}" />
			                <a href="javascript:void(0)" data-id={!! $item['id'] !!} type="button" class="btn btn-danger btn-circle icon_del" id="del_img_demo"><i class="fa fa-times"></i></a>
			                
			            </div>
			        @endforeach
				        <button type="button" class="btn btn-primary" id="addImages">Add Images</button>
				        <div id="insert"></div>
				    </div>
				    {!! Form::close() !!}
				{{-- </form>                    --}}
                </div>
            </div>
        </div>       
</div>


<script>
	$( function() {
    $( "#txtdate" ).datepicker();
  } );
	 //====================== click button update images ===================//

	$(document).ready(function () {
	$("#addImages").click(function () {
		$("#insert").append('<div class="form-group"><input type="file" name="fEditImages[]"></div>');
		});
	});

    $(document).ready(function () {
	$("a#del_img_demo").on('click',function() {
		var id = $(this).data('id');
		var url = "{{route('admin.getDelImg')}}";
		var _token = $("form[name='frmEditStock']").find("input[name='_token']").val();
		var idImage = $(this).parent().find("img").attr("idImage");
		var img = $(this).parent().find("img").attr("src");
		var rid = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url,
			type: 'GET',
			cache: false,
			data: {id:id,urlImage:img},
			success: function (data) {
				if (data == "Oke") {
					$("#"+rid).remove();
				}else {
					alert("Error ! Please Contact Admin");
				}

			}
		});
	});
});
</script>
<script>
	 $(document).ready(function(){
    
    $("#form-edit-stock").validate({
        rules: {
            txtStockName: {
                required: true,
                minlength: 4
            }
            
              
        },
        //For custom messages
        messages: {
            txtStockName:{
                required: "Enter a Stock Name",
                minlength: "Enter at least 5 characters"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error);
            } else {
                error.insertAfter(element);
            }
        }
       
    });
   
</script>
@stop
@push('js')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
@endpush