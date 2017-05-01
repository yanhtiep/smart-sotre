@extends('layouts.backend.layout')
@section('content')
<?php $path = Config::get('constants.assets.backendTemplate'); ?>

<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
<link href="<?=$path?>js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">  
<!--sweetalert -->
<script type="text/javascript" src="<?=$path?>js/plugins/sweetalert/sweetalert.min.js"></script>


	<div id="breadcrumbs-wrapper">
	    <div class="container">
	        <div class="row">
	            <div class="col s12 m8 l9">
	                <h5 class="breadcrumbs-title">Foods Management</h5>
	            </div>
	            <div  class="col s12 m4 l3">
	                <div class="breadcrumbs-title" style="text-align:right">
	                    <a id="assistant-label" class="normal-color-cursor">Create new food</a>
	                    <a id="add-assistant-button" class="btn-floating un-rotate"><i class="mdi-content-add"></i></a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="container">
		<div class="row" id="foods">
			<div class="col s12 m12 l12">
	            <div class="card-panel">
	            	<h4 class="header2" id="form-header-title">New food</h4>
	            	<div class="row">
	                    <form class="col s12 formAddFoodValidate" id="formAddFoodValidate" method="POST" file="true">
	                        <!-- this id="form-type" to specify form is creat form or update form by value "add" or "edit" -->
	                        <input type="hidden" id="form-type" value="add" />
	                        <div class="row">
	                            <div class="input-field col s6">
	                                <input id="name" name="name" type="text" data-error=".errorTxt1">
	                                <label for="name">Name*</label>
	                                <div class="errorTxt1"></div>
	                            </div>
	                            <div class="input-field col s6">
	                                <input id="price" name="price" type="text" data-error=".errorTxt2">
	                                <label for="price">Price*</label>
	                                <div class="errorTxt2"></div>
	                            </div>
	                            <div class="input-field col s6">
	                                <input id="discount" name="discount" type="text" data-error=".errorTxt3">
	                                <label for="discount">Discount</label>
	                                <div class="errorTxt3"></div>
	                            </div>
                                 <div class="input-field col s6">
                                    <input id="qty" name="qty" type="text" data-error=".errorTxt4">
                                    <label for="quantity">Quantity*</label>
                                    <div class="errorTxt4"></div>
                                </div>
	                            <div class="input-field col s6">
                                    <select id="shippingfroms" class="error browser-default" name="shippingfroms[]" data-error=".errorTxt5" multiple="true" style="height: 100%;">
                                      <option value="" disabled="">Shipping from</option>
                                      @foreach ($shippingfroms as $shippingfrom)
                                        <option value="{{$shippingfrom['id']}}">{{$shippingfrom['name']}}</option>
                                      @endforeach
                                    </select>

                                    <div class="input-field">
                                        <div class="errorTxt5"></div>
                                    </div>
                                    <br/>
	                            </div>
                                <div class="input-field col s6">
                                   <select id="categories" class="error browser-default" name="categories" data-error=".errorTxt6" style="height: 100%;">
                                      <option value="" disabled="">Select Category</option>
                                      @foreach ($categories as $categorie)
                                        <option value="{{$categorie['id']}}">{{$categorie['title']}}</option>
                                      @endforeach
                                    </select>
                                    <div class="input-field">
                                        <div class="errorTxt6"></div>
                                    </div>
                                    <br/>
                                </div>
                                <div class="col s12 m6">
                                    <input id="fileupload" type="file" multiple="multiple" name="fileImage" />
                                    <hr />
                                    <b>Live Preview</b>
                                    <br />
                                    <br />
                                    <div id="dvPreview">
                                    </div>
                                 </div>
                                <div class="input-field col s6">
                                    <select id="shippings" class="error browser-default" name="shippings[]" data-error=".errorTxt7" multiple="true" style="height: 100%;">
                                      <option value="" disabled="">Product shipping </option>
                                      @foreach ($shippings as $shipping)
                                        <option value="{{$shipping['id']}}">{{$shipping['name']}}</option>
                                      @endforeach
                                    </select>
                                    <div class="input-field">
                                        <div class="errorTxt7"></div>
                                    </div>
                                    <br/>
                                </div> 
                                <div class="input-field col s12">
                                    <label for="message">Description</label>
                                    <textarea id="exerp" name="exerp" class="materialize-textarea" length="120"></textarea>
                                </div>
	                        </div>
	                        <div class="row">
                                <div class="input-field col s12 action_button">
                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="create">save
                                        <i class="mdi-content-send right"></i>
                                    </button>
                                </div>
	                        </div>
	                   </form>
               		</div>
	            </div>
	        </div>
	    </div>
	</div>
    <div class="container">
		<div class="row" id="rowAddUser">
			<div class="col s12 m12 l12">
	            <div class="card-panel"">
	              <a id="pull-to-refresh" class="btn-floating grey"><i class="mdi-action-cached Medium"></i></a>
                    <div class="tooltip">Refresh</div>
	            	<table class="jsgrid-table user_table" style="width: 100%;">
                        <thead>
                            <tr class="jsgrid-header-row">
                                <th class="jsgrid-header-sortable" style="width: 30px;">No.</th>
                                <th class="jsgrid-header-sortable" style="width: 120px;">Name</th>
                                <th class="jsgrid-header-sortable" style="width: 30px;">Quantity</th>
                                <th class="jsgrid-header-sortable" style="width: 70px;">Price</th>
                                <th class="jsgrid-header-sortable" style="width: 100px;">Ship from</th>
                                <th class="jsgrid-header-sortable" style="width: 120px;">Shipping</th>
                                <th class="jsgrid-header-sortable" style="width: 30px;">Category</th>
                                <th class="jsgrid-header-sortable" style="width: 100px;">Action</th>
                            </tr>
                        </thead>
			            <tbody id="body-data">
                             <?php $i = 0;?>
                            @foreach ($foods as $food)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{ $food['name']}}</td>
                                    <td>{{ $food['exerp']}}</td>
                                    <td>{{ $food['price']}}</td>
                                    <td><a  name="{{ $food['id']}}" class='edit_user' style="cursor:pointer;"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a name="{{ $food['id']}}" class="delete_user" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                      </td>
                                </tr>
                        @endforeach
			            </tbody>
			        </table>
	            </div>
	        </div>
	    </div>
    </div>
<!-- chartist -->
<?php $path = Config::get('constants.assets.backendTemplate'); ?>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">

 window.onload = function () {
            var fileUpload = document.getElementById("fileupload");
            fileUpload.onchange = function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("dvPreview");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "100";
                                img.width = "100";
                                img.src = e.target.result;
                                dvPreview.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            }
        };

    $(document).ready(function() {

        $("#add-assistant-button").hover(function() {
                $( this ).attr("class","btn-floating cyan rotate");
                $("#assistant-label").attr("class","cyan-color-cursor");
            }, function() {
                $( this ).attr("class","btn-floating un-rotate");
                $("#assistant-label").attr("class","normal-color-cursor");
            }
        );
        $("#assistant-label").hover(function() {
                $( "#add-assistant-button" ).attr("class","btn-floating cyan rotate");
                $(this).attr("class","cyan-color-cursor");
            }, function() {
                $( "#add-assistant-button" ).attr("class","btn-floating un-rotate");
                $(this).attr("class","normal-color-cursor");
            }
        );

        //hide form before
        $("#foods").toggle();
        $("a#add-assistant-button").click(function(){
            var label_name = $("#assistant-label").html();
            if(label_name == "Close Form"){
                //to clear data evenif it is edit form
                clearFormData();
                $("#assistant-label").html("Create new food");
                $(this).find("i").removeClass("mdi-navigation-close");
                $(this).find("i").addClass("mdi-content-add");
            }
            else{
                $("#assistant-label").html("Close Form");
                $(this).find("i").removeClass("mdi-content-add");
                $(this).find("i").addClass("mdi-navigation-close");
            }
            $("#foods").toggle(1500);
        });
        $("#assistant-label").click(function(){
            var label_name = $(this).html();
            if(label_name == "Close Form"){
                //to clear data evenif it is edit form
                clearFormData();
                $(this).html("Create Parent Category");
                $("a#add-assistant-button").find("i").removeClass("mdi-navigation-close");
                $("a#add-assistant-button").find("i").addClass("mdi-content-add");
            }
            else{
                $(this).html("Close Form");
                $("a#add-assistant-button").find("i").removeClass("mdi-content-add");
                $("a#add-assistant-button").find("i").addClass("mdi-navigation-close");
            }
            $("#foods").toggle(1500);
        });
    });

    /*
    *   validate add form and perform create category or update
    */
    $("#formAddFoodValidate").validate({
        rules: {
            name: {
                required: true,
                minlength: 4
            },
        },
        //For custom messages
        messages: {
            name:{
                required: "Enter a username",
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

            var form_type = $("input[type=hidden]#form-type").val();
            var formData = new FormData($("#formAddFoodValidate")[0]);
          
            $.ajax({
                url: "{{route('api.foods.add')}}",
                type: 'POST',
                data: formData,
                async: false,
                enctype: 'multipart/form-data',
                success: function (data) {
                    //alert(data);
                    var dic = JSON.parse(data);
                    console.log(dic);
                    if(dic.code == 0){
                        swal({
                            title: "Oop!",
                            text: dic.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }else{
                         //swal("Successed!", "Thanks!", "success");
                      // alert(dic.data.name);
                    //  clearFormData();
                      //createTable(dic.data);
                    }
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });

    /*
    *   close form
    */
    function clearFormData() {
        //remove class row_eding of tr
        $("table tr.row_editing").removeClass("row_editing");

        $("input[type=hidden]#form-type").val("add");
        $('#formAddFoodValidate').trigger("reset");
        $("#icon_previewing").attr("src","{{Config::get('constants.assets.backendTemplate')}}images/ic_coverThumbnail.png");
        $("#image_previewing").attr("src","{{Config::get('constants.assets.backendTemplate')}}images/ic_coverThumbnail.png");
        $("div.action_button").html(
                '<button class="btn cyan waves-effect waves-light right" type="submit" name="create">add<i class="mdi-content-send right"></i></button>'
            );
    }
</script>



@stop