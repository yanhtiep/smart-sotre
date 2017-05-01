@extends('layouts.backend.layout')
@section('content')
<?php $path = Config::get('constants.assets.backendTemplate'); ?>
<!--jsgrid css-->
<link href="{{$path}}js/plugins/jsgrid/css/jsgrid.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?=$path?>js/plugins/jsgrid/css/jsgrid-theme.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
<link href="<?=$path?>js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?=$path?>css/font-awesome.css" type="text/css" rel="stylesheet" media="screen,projection">

<!--sweetalert -->
<script type="text/javascript" src="<?=$path?>js/plugins/sweetalert/sweetalert.min.js"></script>
<style type="text/css">
     .tooltip {
        display:none;
        position:absolute;
        border:1px solid #333;
        background-color:#161616;
        border-radius:5px;
        padding:5px;
        color:#fff;
        font-size:6px Arial;
    }
    a#pull-to-refresh:hover+.tooltip { display: block; }​
    .un-rotate {
        -webkit-transition: all 1s ease 0s;
        -moz-transition: all 1s ease 0s;
        -o-transition: all 1s ease 0s;
        -ms-transition: all 1s ease 0s;
        transition: all 1s ease 0s;
        cursor:pointer;
    }
	.un-rotate {
        -webkit-transition: all 1s ease 0s;
        -moz-transition: all 1s ease 0s;
        -o-transition: all 1s ease 0s;
        -ms-transition: all 1s ease 0s;
        transition: all 1s ease 0s;
        cursor:pointer;
    }
    .rotate {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .normal-color-cursor{
        font-size:14px;color:#FF4081;cursor:pointer
    }
    .cyan-color-cursor{
        font-size:14px;color:#00BCD4;cursor:pointer
    }

    .input-field div.error{
	    position: relative;
	    top: -1rem;
	    left: 0rem;
	    font-size: 0.8rem;
	    color:#FF4081;
	    -webkit-transform: translateY(0%);
	    -ms-transform: translateY(0%);
	    -o-transform: translateY(0%);
	    transform: translateY(0%);
  	}
  	.input-field label.active{
      	width:100%;
  	}
	.left-alert input[type=text] + label:after,
	.left-alert input[type=password] + label:after,
	.left-alert input[type=email] + label:after,
	.left-alert input[type=url] + label:after,
	.left-alert input[type=time] + label:after,
	.left-alert input[type=date] + label:after,
	.left-alert input[type=datetime-local] + label:after,
	.left-alert input[type=tel] + label:after,
	.left-alert input[type=number] + label:after,
	.left-alert input[type=search] + label:after,
	.left-alert textarea.materialize-textarea + label:after{
	      left:0px;
  	}
	.right-alert input[type=text] + label:after,
	.right-alert input[type=password] + label:after,
	.right-alert input[type=email] + label:after,
	.right-alert input[type=url] + label:after,
	.right-alert input[type=time] + label:after,
	.right-alert input[type=date] + label:after,
	.right-alert input[type=datetime-local] + label:after,
	.right-alert input[type=tel] + label:after,
	.right-alert input[type=number] + label:after,
	.right-alert input[type=search] + label:after,
	.right-alert textarea.materialize-textarea + label:after{
	      right:70px;
	}
</style>

<script type="text/javascript">

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
    });

</script>

<div id="breadcrumbs-wrapper">
	<div class="container">
		<div class="row">
			<div class="col s12 m8 l9">
				<h5 class="breadcrumbs-title" >User Management</h5>
				<br/>
			</div>
            <div  class="col s12 m4 l3">
                <div class="breadcrumbs-title" style="text-align:right">
                    <a id="assistant-label" class="normal-color-cursor" >Create Assistant</a>
                    <a id="add-assistant-button" class="btn-floating un-rotate"><i class="mdi-content-add"></i></a>
                </div>
            </div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row" id="rowAddUser">
		<div class="col s12 m12 l12">
            <div class="card-panel" style="box-shadow:none">
                <h4 class="header2" id="form_create_user">Create User</h4>
                <div class="row">
                  	<form class="col s12 formValidate" id="formValidate">
                      <input type="hidden" name="add" id="add" class="add" value="add"/>
                      <input type="hidden" name="updateuser" class="updateuser" id="updateuser" val=""/>
                    	<div class="row">
                      		<div class="input-field col s6">
                        		<input id="firstName" name="firstName" type="text" data-error=".errorTxt1">
                        		<label for="firstName">First Name*</label>
                        		<div class="errorTxt1"></div>
                     		</div>

                      		<div class="input-field col s6">
                        		<input id="lastName" name="lastName" type="text" data-error=".errorTxt2">
                        		<label for="lastName">Last Name*</label>
                        		<div class="errorTxt2"></div>
                      		</div>
                    	</div>
                    	<div class="row">
                    		 <div class="input-field col s6">
		                        <input type="date" id="dob" name="dob" class="datepicker">
		                        <label for="dob">DOB</label>
		                    </div>
		                     <div class="input-field col s6">
                                <label for="email">E-Mail *</label>
                                <input id="email" type="email" name="email" data-error=".errorTxt3">
                                <div class="errorTxt3"></div>
                            </div>
                    	</div>

                    	<div class="row">
                    		<div class="input-field col s6">
                                <label for="password">Password *</label>
                                <input id="password" type="password" name="password" data-error=".errorTxt4">
                                <div class="errorTxt4"></div>
                            </div>
                            <div class="input-field col s6">
                                <label for="cpassword">Confirm Password *</label>
                                <input id="cpassword" type="password" name="cpassword" data-error=".errorTxt5">
                                <div class="errorTxt5"></div>
                            </div>
                        </div>
                    	<div class="row">
                    		<div class="col s12">
                                <label for="genter_select">Gender *</label>
                                <p>
                                	<input name="gender" type="radio" id="gender_male" value="Male" data-error=".errorTxt6"/>
                                	<label for="gender_male">Male</label>
                                </p>
                                <p>
                                    <input name="gender" type="radio" id="gender_female" value="Female"/>
                                    <label for="gender_female">Female</label>
                                </p>
                                <div class="input-field">
                                    <div class="errorTxt6"></div>
                                </div>
                            </div>
                    	</div>
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="phone">Phone *</label>
                                <input id="phone" type="text" name="phone" data-error=".errorTxt8">
                                <div class="errorTxt8"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="address">Address *</label>
                                <input id="address" type="text" name="address" data-error=".errorTxt8">
                                <div class="errorTxt8"></div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s6" id="role">
                            <select id="role_user" class="error browser-default" name="role" data-error=".errorTxt7">
                              <option selected="" disabled="">Select Role</option>
                              <option value="admin">admin</option>
                              <option value="seller">seller</option>
                              <option value="moderator">moderator</option>
                            </select>
                            <div class="errorTxt7"></div>
                          </div>
                          <div class="input-field col s6">
                            <select id="categories" class="error browser-default" name="categories[]" data-error=".errorTxt11" multiple="true" style="height: 100%;">
                              <option value="" disabled="">Select Category</option>
                              @foreach ($Supercategories as $supercategory)
                                <option value="{{$supercategory['id']}}">{{$supercategory['title']}}</option>
                              @endforeach
                            </select>
                            <div class="errorTxt11"></div>
                          </div>
                        </div>
                    	<div class="row">
                      		<div class="input-field col s12">
                        		<textarea id="description" name="description" class="materialize-textarea" length="120"></textarea>
                        		<label for="message">Description</label>
                      		</div>
                      		<div class="row">
                        		<div class="input-field col s12" id='action_button'>
	                          		<button class="btn cyan waves-effect waves-light right" type="submit" name="action">add
	                            		<i class="mdi-content-send right"></i>
	                          		</button>
                        		</div>
                      		</div>
                    	</div>
                  </form>
                </div>
              </div>
            </div>
          </div>
  </div>
	<div class="row">
        <div class="col s12 m12 l12">

            <div id="jsGrid-static" class="jsgrid" style="position: relative; height: 70%; width: 100%;">
			    <!-- thead -->
                 <a id="pull-to-refresh" class="btn-floating grey"><i class="mdi-action-cached Medium"></i></a>
                    <div class="tooltip">Refresh</div>
                          <!-- this date use for operation load more(limit offset) and refresh -->
                    <input type="hidden" id="currentDate" name="currentDate" value="{{ $currentDate }}">
			    <div class="jsgrid-grid-header jsgrid-header-scrollbar"></div>

			    <!-- tbody -->
			    <div class="jsgrid-grid-body jsgrid-header-scrollbar" style="height: 770px;">
			        <table class="jsgrid-table user_table" style="width: 100%;">
                        <thead>
                            <tr class="jsgrid-header-row">
                                <th class="jsgrid-header-sortable" style="width: 30px;">No.</th>
                                <th class="jsgrid-header-sortable" style="width: 120px;">Name</th>
                                <th class="jsgrid-header-sortable" style="width: 30px;">Sex</th>
                                <th class="jsgrid-header-sortable" style="width: 70px;">Phone</th>
                                <th class="jsgrid-header-sortable" style="width: 100px;">Email</th>
                                <th class="jsgrid-header-sortable" style="width: 30px;">Social</th>
                                <th class="jsgrid-header-sortable" style="width: 120px;">Who</th>
                                <th class="jsgrid-header-sortable" style="width: 50px;">Action</th>
                            </tr>
                        </thead>
			            <tbody id="body-data">
                            <?php $i = 0;?>
			                @foreach ($users as $user)

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{ $user['name']}}</td>
                                    <td>{{ $user['gender']}}</td>
                                    <td>{{ $user['phone']}}</td>
                                    <td>{{ $user['email']}}</td>
                                     <td>{{ $user['social']}}</td>
                                    <td class="role">{{ $user['role']}}</td>
                                    <td><a  name="{{ $user['id']}}" class='edit_user' style="cursor:pointer;"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a name="{{ $user['id']}}" class="delete_user" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                      </td>
                                </tr>
                        @endforeach
			            </tbody>
			        </table>
			    </div>

			</div>
        </div>

	</div>

        <div class="col s12 m12 l12" style="text-align:center" id="load-more-position">
            <?php
                if($isLoadMore == 1){
                    echo '<button class="btn waves-effect waves-light" type="button" name="load-more">Load More
                <i class="mdi-action-cached Medium left"></i>
            </button>';
                }
            ?>
        </div>

</div>

<!-- chartist -->
<?php $path = Config::get('constants.assets.backendTemplate'); ?>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">
	var valide_5 = 5;
    $("#formValidate").validate({
        rules: {
            firstName: {
                required: true,
                minlength: 4
            },
            lastName: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email:true
            },
            password: {
				required: true,
				minlength: 5
			},
			cpassword: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
            phone: {
                required: true,
                number: true
            },
            gender:"required",
            role:"required",
        },
        //For custom messages
        messages: {
            firstName:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            },
            lastName:{
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
        	var formData = new FormData($("#formValidate")[0]);
          var url = "{{route('api.users.add')}}";
          if ($('#add').val() == 'edit'){
            url = "{{route('api.users.update')}}";
          }
	        $.ajax({
	            url: url,
	            type: 'POST',
	            data: formData,
	            async: false,
	            enctype: 'multipart/form-data',
	            success: function (data) {

                console.log(data);
	               var dic = JSON.parse(data);
	                if(dic.code == 0){
	                    swal({
	                        title: "Oop!",
	                        text: dic.message,
	                        timer: 2000,
	                        showConfirmButton: false
	                    });
	                }
	                else{
	                    swal("Successed!", "Thanks!", "success");
                      // alert(dic.data.name);
                      clearFormData();
                      createTable(dic.data);
	                }
	            },
	            cache: false,
	            contentType: false,
	            processData: false
	        });

        }

    });
    /*
    * edit_user
    *
    */

    $(document).on('click','.edit_user',function(){
        var id = $(".edit_user").attr("name");
        var tr = $(this).parent().parent();
        var old = tr.find('td.role').html();
        $('#add').val('edit');

        $.ajax({
             type: "POST",
             url: "{{ route('api.users.edit') }}",
             data: {
                 'id':id,
                 'role': old
             },
             async: false,
             success: function(data) {

              var dic = JSON.parse(data);
              console.log(dic);
                 if(dic.code == 0){
                   swal({
                       title: "Oop!",
                       text: dic.message,
                       timer: 2000,
                       showConfirmButton: false
                   });
                 }
                 else{
                    $('#firstName').val(dic.data.firstName);
                    $('#firstName').prop('disabled', true);
                    $('#lastName').val(dic.data.lastName);
                    $('#lastName').prop('disabled', true);
                    $('#dob').val(dic.data.dob);
                    $('#dob').prop('disabled', true);
                    $('#email').val(dic.data.email);
                    $('#email').prop('disabled', true);
                    $('#password').val();
                    $('#password').prop('disabled', true);
                    $('#cpassword').val();
                    $('#cpassword').prop('disabled', true);
                    $('#phone').val(dic.data.phone);
                    $('#phone').prop('disabled', true);
                    $('#address').val(dic.data.address);
                    $('#address').prop('disabled', true);
                    $('#description').val(dic.data.description);
                    $('#description').prop('disabled', true);
                    $('select#role_user').val(dic.data.role);
                    $('#updateuser').val(dic.data.id);
                     $("select#categories").prop('disabled', true);
                    for (var i = 0; i < dic.data.businesstype.length; i++) {
                      if(dic.data.businesstype[i].id !=""){
                        $('select#categories option').filter('[value="'+dic.data.businesstype[i].id+'"]').prop('selected', true);
                      }else{
                        console.log('can not detect select multipart');
                      }
                    }
                 }
                 console.log(dic.data.gender);
                 if(dic.data.gender == 'Female'){
                   $('#gender_female').attr('checked', true);
                 }else{
                   $('#gender_male').attr('checked', true);
                 }
                 $('td.role #role_user_edit').hide();
                 tr.find('td.role').text(old);
             }
         });
        $('#form_create_user').html('UPDATE USER');
        $("div#action_button").html(
                '<input type="hidden" id="categoryId" name="cateId" value="'+id+'" />'+
                '<button class="btn cyan waves-effect waves-light right" type="submit" name="update" >Update</button>'+
                '<button id="cancel-button" onclick="clearFormData()" class="btn red waves-effect waves-light darken-4 right" type="button" style="margin-right:5px">Cancel</button>'
            );
        $("#rowAddUser").show(1500);
        tr.find('td.role #role_user_edit').show();
    });
    //
    // $(document).on('blur','select#role_user_edit' ,function(){
    //     var tr = $(this).parent().parent();
    //     var old = tr.find("td select#role_user_edit").val();
    //     tr.find('td.role').html(old);
    //     tr.find('td.role #role_user_edit').hide();
    // });
    // /*
    // * change value user role
    // */
    //
    // $(document).on('change','select#role_user_edit', function() {
    //
    //    var role = this.value;
    //    var tr = $(this).parent().parent();
    //    var id = tr.find("td a.edit_user").attr('name');
    //    $.ajax({
    //         type: "POST",
    //         url: "{{ route('api.users.edit') }}",
    //         data: {
    //             'id':id,
    //             'role': role
    //         },
    //         async: false,
    //         success: function(data) {
    //
    //          var dic = JSON.parse(data);
    //             if(dic.code == 0){
    //               swal({
    //                   title: "Oop!",
    //                   text: dic.message,
    //                   timer: 2000,
    //                   showConfirmButton: false
    //               });
    //             }
    //             else{
    //               swal("Successed!", "Thanks!", "success");
    //             }
    //
    //             $('td.role #role_user_edit').hide();
    //             tr.find('td.role').text(role);
    //         }
    //     });
    //
    // });


    function clearFormData() {
        //remove class row_eding of tr
        $("table tr.row_editing").removeClass("row_editing");
        $("input[type=hidden]#add").val("add");
        $('#gender_female').attr('checked', false);
        $('#gender_male').attr('checked', false);
        $("#formValidate").trigger('reset');
        $('#firstName').prop('disabled', false);
        $('#lastName').prop('disabled', false);
        $('#dob').prop('disabled', false);
        $('#email').prop('disabled', false);
        $('#password').prop('disabled', false);
        $('#cpassword').prop('disabled', false);
        $('#phone').prop('disabled', false);
        $('#address').prop('disabled', false);
        $('#description').prop('disabled', false);
        $("div#action_button").html(
                '<button class="btn cyan waves-effect waves-light right" type="submit" name="create">add<i class="mdi-content-send right"></i></button>'
            );
    }

    /*
    *
    *delete user
    */
    $(document).on('click','.delete_user',function(){
        var id = $(this).attr("name");
        var tr = $(this).parent().parent();
        tr.addClass('row_deleting');

        swal({    title: "Are you sure?",
              text: "You want to delete user!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false },
              function(){
               $.ajax({
                    type: "POST",
                    url: "{{ route('api.users.delete') }}",
                    data: {
                        'id':id
                    },
                    async: false,
                    success: function(data) {
                     var dic = JSON.parse(data);
                        if(dic.code == 0){
                          swal({
                              title: "Oop!",
                              text: dic.message,
                              timer: 2000,
                              showConfirmButton: false
                          });
                        }
                        else{
                          swal("Successed!", "Thanks!", "success");
                          $('tr.row_deleting').remove();
                        }
                    }
                });
            });

    });
    /*
    * create option select role user
    */
    function createOptionSelectRole(role){
      var roleUsers = ['admin', 'moderator', 'seller', 'customer'];
      var option = '<ul id="select-options-c773dddf-9675-2c84-93c3-a63856dff214" class="dropdown-content select-dropdown "><li class=""><span>Select Role</span></li>';
      var i =0;
      for (i; i<roleUsers.length; i++){
          if(roleUsers[i] == role){
             option += '<li class=""><span>'+role+'</span></li>';
          }else {
            option += '<li class=""><span>'+roleUsers[i]+'</span></li>';
          }
      }

      option +='</ul>';

      return option;
    }

    /*
    * create table html user
    *
    */

    function createTable($data){
        var i = 0;
        var table = '<tr>'+
              '<td>'+2+'</td>'+
              '<td>'+$data.name+'</td>'+
              '<td>'+$data.gender+'</td>'+
              '<td>'+$data.phone+'</td>'+
              '<td>'+$data.email+'</td>'+
              '<td>'+$data.social+'</td>'+
              '<td class="role">'+$data.role+'</td>'+
              '<td>'+'<a  name="'+$data.id+'" class="edit_user" style="cursor:pointer;"><i class="fa fa-pencil-square" aria-hidden="true" ></i></a> | <a name="'+$data.id+'" class="delete_user" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true" ></i></a>'+'</td>'+
              '</tr>';
       $("table.user_table > tbody").prepend(table);


    }
    /*
    *hide form create user
    *
    */

    $("#add-assistant-button").click(function(){
        $("#rowAddUser").toggle(1500);
    });

    /*
    *clear data form add user
    *
    */
    function clearDataForm(){
        $("#formValidate").trigger('reset');
    }

    /*
    *   load more button
    */
    $(document).on('click','button[name=load-more]', function(){
        var currentDate = $("input#currentDate").val();
        var limit = 3;
        var offset = $("tbody#body-data tr").length;
        //alert(currentDate+" | "+limit+" | "+offset);

        $.ajax({
            type: "POST",
            url: "{{route('api.users.getUserLimit')}}",
            data: {
                "currentDate" : currentDate,
                "limit" : limit,
                "offset" : offset
            },
            async: false,
            success: function(data) {
                var dic = JSON.parse(data);
                if(dic.code == 0){
                    swal({
                        title: "Oop!",
                        text: dic.message.description,
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
                //dic.code == 1 is success
                else if(dic.code == 1){
                    //remove button loadmore or not
                    if(dic.data.isloadmore == "0"){
                        $("div#load-more-position").html("");
                    }
                    //append datas to table
                    console.log(dic.data.users);
                appendDataToTableBody(dic.data.users);
                }
            }
        });
    });

    function appendDataToTableBody($data){
        var url_resource = "<?php echo asset("/");?>";
        var offset = $("tbody#body-data tr").length;
        $tbody = "";
        $class = "jsgrid-row";
        $start = offset +1;
        for (i = 0; i < $data.length; i++) {
            $tbody += '<tr>'+
              '<td>'+(i+$start)+'</td>'+
              '<td>'+$data[i]['username']+'</td>'+
              '<td>'+$data[i]['gender']+'</td>'+
              '<td>'+$data[i]['phone']+'</td>'+
              '<td>'+$data[i]['email']+'</td>'+
              '<td>'+$data[i]['social']+'</td>'+
              '<td class="role">'+$data[i]['role']+'</td>'+
              '<td>'+'<a  name="'+$data[i]["id"]+'" class="edit_user" style="cursor:pointer;"><i class="fa fa-pencil-square" aria-hidden="true" ></i></a> | <a name="'+$data[i]["id"]+'" class="delete_user" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true" ></i></a>'+'</td>'+
              '</tr>';
        }
        $("tbody#body-data").append($tbody);
    }

    /*
    *   refresh
    */
    $(document).on('click','a#pull-to-refresh', function(){
        //alert("hello");
        var currentDate = $("input#currentDate").val();

        $.ajax({
            type: "POST",
            url: "{{route('api.users.pullToRefresh')}}",
            data: {
                "currentDate" : currentDate
            },
            async: false,
            success: function(data) {
                //alert(data);
                var dic = JSON.parse(data);
                if(dic.code == 0){
                    swal({
                        title: "Oop!",
                        text: dic.message.description,
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
                //dic.code == 1 is success
                else if(dic.code == 1){
                    //resetDate to lastest date come with api data
                    $("input#currentDate").val(dic.data.currentDate);
                    prependDatasToTable(dic.data.users);
                }
            }
        });
    });

    function prependDatasToTable($data){
        var url_resource = "<?php echo asset("/");?>";
        var offset = $("tbody#body-data tr").length;
        $tbody = "";
        $class = "jsgrid-row";
        $start = offset +1;
        for (i = 0; i < $data.length; i++) {
            $tbody += '<tr>'+
              '<td>'+(i+$start)+'</td>'+
              '<td>'+$data[i]['username']+'</td>'+
              '<td>'+$data[i]['gender']+'</td>'+
              '<td>'+$data[i]['phone']+'</td>'+
              '<td>'+$data[i]['email']+'</td>'+
              '<td>'+$data[i]['social']+'</td>'+
              '<td class="role">'+$data[i]['role']+'</td>'+
              '<td>'+'<a  name="'+$data[i]["id"]+'" class="edit_user" style="cursor:pointer;"><i class="fa fa-pencil-square" aria-hidden="true" ></i></a> | <a name="'+$data[i]["id"]+'" class="delete_user" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true" ></i></a>'+'</td>'+
              '</tr>';
        }
        $("tbody#body-data").prepend($tbody);
    }


</script>

@stop
