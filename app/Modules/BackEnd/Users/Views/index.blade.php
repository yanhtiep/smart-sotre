@extends('layouts.backend.layout')
@section('content')
    <div id="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-md-6">
                <h4 class="breadcrumbs-title">User management</h4>
                <br/>
            </div>
            <div  class="col-md-6">
                <div class="breadcrumbs-title" style="text-align:right">
                    <a id="assistant-label" class="normal-color-cursor">Create user</a>
                    <a id="add-assistant-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="rowAddUser">
        <div class="col-md-12">
            <div class="panel panel-default" style="box-shadow:none">
                <h4 class="header2" id="form_create_user">Create User</h4>
                <div class="row">
                    <form class="col-md-12 formValidate" id="formValidate">
                      <input type="hidden" name="add" id="add" class="add" value="add"/>
                      <input type="hidden" name="updateuser" class="updateuser" id="updateuser" val=""/>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First Name*</label>
                                <input id="firstName" name="firstName" type="text" data-error=".errorTxt1" class="form-control">
                                <div class="errorTxt1"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name*</label>
                                <input id="lastName" name="lastName" type="text" data-error=".errorTxt2" class="form-control">
                                <div class="errorTxt2"></div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="form-group col-md-6">
                                <label for="dob">DOB</label>
                                <input class="form-control" id="dob" name="dob"
                                placeholder="mm/dd/yyyy" type="text">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="email">E-Mail *</label>
                                <input id="email" type="email" name="email" data-error=".errorTxt3" class="form-control">
                                <div class="errorTxt3"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password *</label>
                                <input id="password" type="password" name="password" data-error=".errorTxt4" class="form-control">
                                <div class="errorTxt4"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cpassword">Confirm Password *</label>
                                <input id="cpassword" type="password" name="cpassword" data-error=".errorTxt5" class="form-control">
                                <div class="errorTxt5"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="genter_select">Gender *</label>
                                <p>
                                    <input name="gender" type="radio" id="gender_male" value="Male" data-error=".errorTxt6" />
                                    <label for="gender_male">Male</label>
                                </p>
                                <p>
                                    <input name="gender" type="radio" id="gender_female" value="Female"/>
                                    <label for="gender_female">Female</label>
                                </p>
                                <div class="form-group">
                                    <div class="errorTxt6"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="phone">Phone *</label>
                                <input id="phone" type="text" name="phone" data-error=".errorTxt8" class="form-control">
                                <div class="errorTxt8"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="address">Address *</label>
                                <input id="address" type="text" name="address" data-error=".errorTxt8" class="form-control">
                                <div class="errorTxt8"></div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-6" >
                          <label class="col-sm-3 control-label">role</label>
                            <div class="col-sm-9">
                                <select class="select2" name="role" data-error=".errorTxt7" id="role">
                                  <option selected="" disabled="">Select Role</option>
                                  <option value="admin">admin</option>
                                  <option value="seller">seller</option>
                                  <option value="moderator">moderator</option>
                            </select>
                            <div class="errorTxt7"></div>
                          </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="message">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="5" length="120"></textarea>
                            </div>
                            <div class="row">
                                <div class="pull-right">
                                    <div class="btn-group" id='action_button'>
                                        <button class="btn btn-success" type="submit" name="action">add
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="row">
        <div class="col s12 m12 l12">

            <div id="jsGrid-static" class="col-md-12" style="position: relative; height: 70%; width: 100%;">
                <!-- thead -->
                 <a id="pull-to-refresh" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
                    
                          <!-- this date use for operation load more(limit offset) and refresh -->
                    <input type="hidden" id="currentDate" name="currentDate" value="{{ $currentDate }}">
                <div class="jsgrid-grid-header jsgrid-header-scrollbar"></div>

                <!-- tbody -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table class="table user_table" style="width: 100%;">
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
                                    <td><a  name="{{ $user['id']}}" class='edit_user btn btn-xs btn-info' style="cursor:pointer;"><i class="fa fa-edit" aria-hidden="true"></i></a> | <a name="{{ $user['id']}}" class="delete_user btn btn-xs btn-danger" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                      </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                 <div class="col-sm-12" style="text-align:center" id="load-more-position">
                    <?php
                        if($isLoadMore == 1){
                            echo '<button class="btn btn-danger" type="button" name="load-more">Load More
                        <i class="fa fa-spinner"></i>
                    </button>';
                        }
                    ?>
                 </div>
                </div>
                <button onclick="updatetble()">click</button>
            </div>
        </div>

        </div>
    </div>

<script type="text/javascript">
   $(document).ready(function(){
     // $(".select2").select2({
     //        width: '100%'
     // });
     $('#dob').datepicker();

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
                    else if (formData == "edit"){
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
    /*
    * edit_user
    *
    */

    $(document).on('click','.edit_user',function(){
        var tr = $(this).parent().parent();
        var id =tr.find('a').attr('name');
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

                    // $("select#categories option[value='1']").prop("selected", true);

                 }

                 if(dic.data.gender == 'Female'){
                   $('#gender_female').attr('checked', true);
                   $('#gender_female').prop('disabled', true);
                   $('#gender_male').prop('disabled', true);
                 }else{
                   $('#gender_male').attr('checked', true);
                   $('#gender_female').prop('disabled', true);
                   $('#gender_male').prop('disabled', true);
                 }
                 $('td.role #role_user_edit').hide();
                 tr.find('td.role').text(old);
               
                $('#role').select2().val(old).trigger("change");
             }
         });
        $('#form_create_user').html('UPDATE USER');
        $("div#action_button").html(
                '<input type="hidden" id="categoryId" name="cateId" value="'+id+'" />'+
                '<button class="btn btn-info" type="submit" name="update" >Update</button>'+
                '<button id="cancel-button" onclick="clearFormData()" class="btn btn-danger" type="button" style="margin-right:5px">Cancel</button>'
            );
        $("#rowAddUser").show(1500);
        tr.find('td.role #role_user_edit').show();
    });
 

   

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
    * create table html user
    *
    */

    function createTable($data){
        var table = '<tr>'+
              '<td>'+$('.user_table tr').length+'</td>'+
              '<td>'+$data.name+'</td>'+
              '<td>'+$data.gender+'</td>'+
              '<td>'+$data.phone+'</td>'+
              '<td>'+$data.email+'</td>'+
              '<td>'+$data.social+'</td>'+
              '<td class="role">'+$data.role+'</td>'+
              '<td>'+'<a  name="'+$data.id+'" class="edit_user tn btn-xs btn-info" style="cursor:pointer;"><i class="fa fa-edit" aria-hidden="true" ></i></a> | <a name="'+$data.id+'" class="delete_user btn btn-xs btn-danger" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true" ></i></a>'+'</td>'+
              '</tr>';
       $("table.user_table > tbody").prepend(table);


    }
    /*
    *hide form create user
    *
    */
    $("#rowAddUser").hide();
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
              '<td>'+'<a  name="'+$data[i]["id"]+'" class="edit_user btn btn-xs btn-info" style="cursor:pointer;"><i class="fa fa-edit" aria-hidden="true" ></i></a> | <a name="'+$data[i]["id"]+'" class="delete_user btn btn-xs btn-danger" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true" ></i></a>'+'</td>'+
              '</tr>';
        }
        $("tbody#body-data").append($tbody);
    }

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
         $('#gender_female').prop('disabled', false);
                   $('#gender_male').prop('disabled', false);
        $('#role').select2().val('').trigger("change");
        $("div#action_button").html(
                '<button class="btn btn-success" type="submit" name="create">add<i class="mdi-content-send right"></i></button>'
            );
    }

    function updatetble(){
        var currentDate = $("input#currentDate").val();
        var limit = 3;
        var offset = $("tbody#body-data tr").length;
        //alert(currentDate+" | "+limit+" | "+offset);
        $.ajax({
            type: "POST",
            url: "{{route('api.users.getUserWithLimitOffsetUpdate')}}",
            data: {
                "currentDate" : currentDate,
                "limit" : limit,
                "offset" : 0
            },
            async: false,
            success: function(data) {
                var dic = JSON.parse(data);
                console.log(dic.data['users']);
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
                        var offset = $("tbody#body-data tr").length;
                        $tbody = "";
                        $class = "jsgrid-row";
                        $start = offset +1;

                        // for (i = 0; i < dic.data['users'].length; i++) {
                        //     $tbody += '<tr>'+
                        //       '<td>'+(i+$start)+'</td>'+
                        //       '<td>'+dic.data[i]['username']+'</td>'+
                        //       '<td>'+dic.data[i]['gender']+'</td>'+
                        //       '<td>'+dic.data[i]['phone']+'</td>'+
                        //       '<td>'+dic.data[i]['email']+'</td>'+
                        //       '<td>'+dic.data[i]['social']+'</td>'+
                        //       '<td class="role">'+dic.data[i]['role']+'</td>'+
                        //       '<td>'+'<a  name="'+dic.data[i]["id"]+'" class="edit_user" style="cursor:pointer;"><i class="fa fa-pencil-square" aria-hidden="true" ></i></a> | <a name="'+dic.data[i]["id"]+'" class="delete_user" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true" ></i></a>'+'</td>'+
                        //       '</tr>';
                        // }
                        // $("tbody#body-data").prepend($tbody);
                                    }
                                    
                                }
                            }
                        });
    }
</script>
@stop

@push('js')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
@endpush