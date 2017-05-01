@extends('layouts.backend.layout')
@section('content')
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div id="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-md-6">
                <h4 class="breadcrumbs-title">Stock management</h4>
                <br/>
            </div>
            <div  class="col-md-6">
            <div class="breadcrumbs-title" style="text-align:right">
                <a id="assistant-label" class="normal-color-cursor">Create Product</a>
                <a id="add-assistant-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
        </div>
    </div>
<div class="row" id="rowAddStock">
        <div class="col-md-12">
            <div class="panel panel-default" style="box-shadow:none">
                <h4 class="header2" id="form_create_category">Create Product</h4>
                <div class="row">
                    <form id="form-add-stock" enctype="multipart/form-data" method="POST">
				    <div class="col-lg-7" style="padding-bottom:120px">
				        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				        <input type="hidden" name="add" id="add" class="add" value="add" />
				            <div class="form-group">
				                <label>Category Parent</label>
				                <select class="form-control" name="sltParent">
				                    <option value="">Please Choose Category</option>
				                   	<?php menuStore ($cate_choose,0,$str="---|",old('sltParent')); ?>
				                </select>
				             </div>
                            <div class="row">
    							<div class="form-group col-md-6">
    			                	<label>Name</label>
    			                	<input class="form-control" name="txtStockName" placeholder="Please Enter Name" value="{!! old('txtName') !!}" />
    			            	</div>
                                <div class="form-group col-md-6">
                                    <label>Cost</label>
                                    <input class="form-control" name="txtCost" placeholder="Please Enter Cost" value="" />
                                </div>
    				            
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Stock code</label>
                                    <input class="form-control" name="txtStockcode" placeholder="Please Enter Stock code" value="" />
                                </div>
    				            <div class="form-group col-md-6">
    				                <label>Quote code</label>
    				                <input class="form-control" name="txtQuotecode" placeholder="Please Enter Quote code" value="" />
    				            </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Min order allow</label>
                                    <input class="form-control" name="txtMinorder" placeholder="Please Enter Min Order " value="" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Max order allow</label>
                                    <input class="form-control" name="txtMaxorder" placeholder="Please Enter Max Order" value="" />
                                </div>
                            </div>
                            <div class="row">
    				            <div class="form-group col-md-6">
    				                <label>Quantity</label>
    				                <input class="form-control" type="number" autocomplete="off" Min="1" Max="30" name="txtQuantity" placeholder="  Quantity" value="" />
    				            </div>
    				            <div class="form-group col-md-6">
    				                <label>Reorder Quantity</label>
    				                <input class="form-control" type="number" autocomplete="off" Min="1" Max="30" name="txtReorderQuantity" placeholder=" Reorder Quantity" value="" />
    				            </div>
                            </div>
                            <div class="row">
    				           <div class="form-group col-md-6">
                                        <label>Meta Keywords</label>
                                        <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="" />
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
    				                <input class="form-control" name="txtRate" placeholder="Please Enter Rate" value="" />
    				            </div>
    				            <div class="form-group col-md-6">
    				                <label>Review Number </label>
    				                <input class="form-control" name="txtReview" placeholder="Review number" value="" />
    				            </div>
                            </div>
                            <div class="row">
    				            <div class="form-group col-md-6">
                                    <label>Date</label>
                                    <input class="form-control" id="txtdate" name="txtdate"
                                    data-date-format="yyyy/mm/dd/" placeholder="mm/dd/yyyy" type="text" >
                                </div>
    				            <div class="form-group col-md-6">
    					            <label>Status</label>
    					            <div class="">
    					            <label class="radio-inline">
    					                <input name="rdoStatus" value="1" type="radio" 
                                        @if(old('rdoStatus') == "1")
                                            checked 
                                        @endif
                                        >Visible
    					            </label>
    					            <label class="radio-inline">
    					                <input name="rdoStatus" value="0" type="radio" 
                                        @if(old('rdoStatus') == "0")
                                            checked 
                                        @endif
                                        >Invisible
    					            </label>
    					            </div>
    					        </div>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="container" style="margin-top: 10px;width: 500px; float: left;">
                                <form>
                                    <input type="file" name="ImagesDetail" accept="image" multiple>
                                </form>
                            </div>				            
							<div class="form-group">
				                <label>Description</label>
				                <textarea class="form-control" rows="3" name="txtDescription"></textarea>
				            </div>
				            
				            <button  type="submit" class="btn btn-default" id="refresh">Product Add</button>
				            <button type="reset" class="btn btn-default">Reset</button>
				        
				    </div>
				    {{-- <div class="col-md-1"></div>
				    <div class="col-md-4">
				    @for ($i = 1; $i <=2; $i++)
				        <div class="form-group">
				            <label>Image {!! $i !!}</label>
				            <input id="img" type="file" name="ImagesDetail[]" />
				        </div>
				        @endfor
				    </div> --}}
                    
				</form>                   
                </div>
            </div>
        </div>       
</div>
<!-- =========================== start list =================== -->
<div class="panel panel-default">
    <div class="row">
        <div class="col s12 m12 l12">

            <div id="jsGrid-static" class="col-md-12" style="position: relative; height: 70%; width: 100%;">
                <!-- thead -->
                 <a id="pull-to-refresh" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
                <div class="jsgrid-grid-header jsgrid-header-scrollbar"></div>

                <!-- tbody -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table class="table user_table" style="width: 100%;">
                        <thead>
                        <thead>
                            <tr class="jsgrid-header-row" align="center">
                                <th class="jsgrid-header-sortable" style="width: 30px;">No.</th>
                                <th class="jsgrid-header-sortable" style="width: 120px;">Name</th>
                                <th class="jsgrid-header-sortable" style="width: 10px;">Cost</th>
                                <th class="jsgrid-header-sortable" style="width: 120px;">Date</th>
                                <th class="jsgrid-header-sortable" style="width: 120px;">Category</th>
                                <th class="jsgrid-header-sortable" style="width: 50px;">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody id="body-data">
                            <?php $stt = 0 ?>
                        @foreach ($list_view as $item)
                             <?php $stt = $stt + 1 ?>
                            <tr class="odd gradeX" >
                                <td>{!! $stt !!}</td>
                                <td>{!! $item["name"] !!}</td>
                                <td>{!! $item["cost"] !!}</td>
                                <td>{!! $item["expired_date"] !!}</td>
                                <td>
                                    <?php $cate = DB::table('categories')->where('id',$item["category_id"])->first(); ?>
                                    @if (!empty($cate->name))
                                        {!! $cate->name !!}
                                    @endif
                                </td>

                                    <td >
                                    <a href="{{route('admin.stock-edit',$item['id'])}}" name="" class='edit_category btn btn-xs btn-info' style="cursor:pointer;">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a> | 
                                    <a onclick= "return youwantdelete('Are you sure you want to delete ?')" href="{{route('admin.stock-delete',$item['id'])}}" name="" class="delete_user btn btn-xs btn-danger" style="cursor:pointer;">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                      </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $list_view->render() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================== End list ============================== -->
<script>
	$( function() {
    $( "#txtdate" ).datepicker();
  } );
</script>
<script type="text/javascript">
            $(document).ready(function() {
                $('input[type="file"]').imageuploadify();
            })
</script>
<script>
	 $(document).ready(function(){
     //hide form before
        $("#rowAddStock").toggle();
        $("a#add-assistant-button").click(function(){
            var label_name = $("#assistant-label").html();
            if(label_name == "Close"){
                //to clear data evenif it is edit form
                //clearFormData();
                $("#assistant-label").html("Create Child Category");
                $(this).find("i").removeClass("fa fa-minus");
                $(this).find("i").addClass("fa fa-plus-circle");
            }
            else{
                $("#assistant-label").html("Close");
                $(this).find("i").removeClass("fa fa-plus-circle");
                $(this).find("i").addClass("fa fa-minus");
            }
            $("#row-form").toggle(1500);
        });
    $("#form-add-stock").validate({
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
        },
        submitHandler: function(form) {
            var formData = new FormData($("#form-add-stock")[0]);
            var url = "{{route('api.add.stock')}}";

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                async: false,
                enctype: 'multipart/form-data',
                 success: function (data) {
                //     alert(data);
                   var dic = JSON.parse(data);
                    if(dic.code == 0){
                        swal({
                            title: "Oop!",
                            text: dic.message,
                            timer: 1000,
                            showConfirmButton: false
                        });
                    }
                    else if (formData == "add"){
                        swal("Successed!", "Thanks!", "success");
                      // alert(dic.data.name);
                        clearFormData();
                        createTable(dic.data);
                    }else{
                         swal("Successed!", "Thanks!", "success");
                         clearFormData();
                         // location.reload();
                         updatetble();
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });

        }
 
    });
    /* refresh function -----------*/
    // $( "#refresh" ).click(function() {setTimeout(function() {
    //         location.reload();
    //     },3000);
    // });
    /*
    *hide form create category
    *
    */

    $("#rowAddStock").hide();
    $("#add-assistant-button").click(function(){
        $("#rowAddStock").toggle(1500);

    });

    /*
    *clear data form add cate
    *
    */
    function clearDataForm(){
        $("#formValidate").trigger('reset');
    }  

   });
function appendDataToTableBody($data){
        var url_resource = "<?php echo asset("/");?>";
        var offset = $("tbody#body-data tr").length;
        $tbody = "";
        $class = "jsgrid-row";
        $start = offset +1;
        
        $("tbody#body-data").append($tbody);
    }

 function prependDatasToTable($data){
        var url_resource = "<?php echo asset("/");?>";
        var offset = $("tbody#body-data tr").length;
        $tbody = "";
        $class = "jsgrid-row";
        $start = offset +1;
        
        $("tbody#body-data").prepend($tbody);
    }
</script>
@stop
@push('js')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
@endpush