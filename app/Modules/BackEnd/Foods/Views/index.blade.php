@extends('layouts.backend.layout')
@section('content')
    <div id="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-md-6">
                <h4 class="breadcrumbs-title">Foods management</h4>
                <br/>
            </div>
            <div  class="col-md-6">
                <div class="breadcrumbs-title" style="text-align:right">
                    <a id="assistant-label" class="normal-color-cursor">Create food</a>
                    <a id="add-assistant-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="row-form">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    <h3 class="panel-title">Create new iteam</h3> 
                </div> 
                <div class="panel-body"> 
                    <div id="wizard-vertical">
                        <h3>Product information</h3>
                        <section>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="userName1"> Name *</label>
                                <div class="col-lg-10">
                                    <input class="form-control required" id="userName1" name="userName" type="text">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="password1"> Price *</label>
                                <div class="col-lg-10">
                                    <input id="price" name="price" type="text" class="required form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="confirm1">Quantity *</label>
                                <div class="col-lg-10">
                                    <input id="qty" name="qty" type="text" class="required form-control">
                                </div>
                            </div>
                        </section>
                        <h3>Profile</h3>
                        <section>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label" for="name1"> First name *</label>
                                <div class="col-lg-10">
                                    <input id="name1" name="name" type="text" class="required form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="surname1"> Last name *</label>
                                <div class="col-lg-10">
                                    <input id="surname1" name="surname" type="text" class="required form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="email1">Email *</label>
                                <div class="col-lg-10">
                                    <input id="email1" name="email" type="text" class="required email form-control">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="address1">Address *</label>
                                <div class="col-lg-10">
                                    <input id="address1" name="address" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <label class="col-lg-12 control-label ">(*) Mandatory</label>
                            </div>
                        </section>
                        <h3>Hints</h3>
                        <section>
                            <div class="col-lg-12 nopadding">
                                 <textarea id="txtEditor"></textarea> 
                            </div>
                        </section>
                        <h3>Galleries</h3>
                        <section>
                            <div class="m-b-30">
                                <form action="#" class="dropzone" id="dropzone">
                                  <div class="fallback">
                                    <input name="file" type="file" multiple />
                                  </div>
                                </form>
                            </div>
                        </section>
                    </div> <!-- End #wizard-vertical --> 
                </div>  <!-- End panel-body -->
            </div> <!-- End panel -->
        </div> <!-- end col -->
    </div> <!-- End row -->

    <div class="row" id="row-form">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Shipping</th>
                                            <th>Shipping from</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($foods as $index => $food)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{ $food['name']}}</td>
                                                <td>3</td>
                                                <td>5</td>
                                                <td>Cambodia,Thai,Vietnam</td>
                                                <td>Lao</td>
                                                <td>T-shirt</td>
                                                <td>
                                                    <a  name="{{ $food['id']}}" class='btn btn-xs btn-info'><i class="fa fa-edit" aria-hidden="true" title="Edite"></i></a> <a name="{{ $food['id']}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div> <!-- End row -->
    <script type="text/javascript">

    $(document).ready(function() {

        $("#txtEditor").Editor();
   
        //hide form before
        $("#row-form").toggle();
        $("a#add-assistant-button").click(function(){
            var label_name = $("#assistant-label").html();
            if(label_name == "Close"){
                //to clear data evenif it is edit form
                clearFormData();
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

        $("#assistant-label").click(function(){
            var label_name = $(this).html();
            if(label_name == "Close"){
                //to clear data evenif it is edit form
                clearFormData();
                $(this).html("Create new iteam");
                $("a#add-assistant-button").find("i").removeClass("fa fa-minus");
                $("a#add-assistant-button").find("i").addClass("fa fa-plus-circle");
            }
            else{
                $(this).html("Close");
                $("a#add-assistant-button").find("i").removeClass("fa fa-plus-circle");
                $("a#add-assistant-button").find("i").addClass("fa fa-minus");
            }
            $("#row-form").toggle(1500);
        });
    });

    /*
    * action change image
    */
    $("#fileImage").change(function() {
        $("#image_message").html(''); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];

        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) ) )
        {
            $('#image_previewing').attr('src','noimage.png');
            $("#image_message").html("<p id='error' style='color:red'>Please Select A valid Image File</p>");
            return false;
        }
        else
        {
            var reader = new FileReader();
            //imageIsLoaded
            reader.onload = function(e) {
                                        $("#fileImage").css("color","green");
                                        $('#image_previewing').attr('src', e.target.result);
                                  };
            reader.readAsDataURL(this.files[0]);
        }
    });

    /*
    *   validate add form and perform create category or update
    */
    $("#form-add-edit-child-category").validate({
        rules: {
            category:"required",
            title: {
                required: true,
                minlength: 4
            },
        },
        //For custom messages
        messages: {
            title:{
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
            var formData = new FormData($("#form-add-edit-child-category")[0]);
            var url = "";

            if(form_type == 'add'){
                url = "{{route('api.add.subcategory')}}";
                formData.append('currentDate', $("input#currentDate").val());
            }
            else if(form_type == 'edit'){
                url = "{{route('api.edit.subcategory')}}";
                formData.append('id', $("input[type=hidden]#categoryId").val());
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                async: false,
                enctype: 'multipart/form-data',
                success: function (data) {
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
                        if(form_type == 'add'){
                            swal("Successed!", "Thanks!", "success");
                            //resetDate to lastest date come with api data
                            $("input#currentDate").val(dic.data.currentDate);
                            prependDatasToTable(dic.data.newSubcategories);
                            clearFormData();
                        }
                        else if(form_type == 'edit'){
                            var data = dic.data;
                            swal("Successed!", "Update completed!", "success");
                            updateDataToEditingRow($("table > tbody#body-data  > tr.row_editing"),data);
                            clearFormData();
                        }
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });

    function prependDatasToTable($data){
        var url_resource = "<?php echo asset("/");?>";
        $tbody = "";
        $class = "jsgrid-row";
        for (i = 0; i < $data.length; i++) {
            $tbody += '<tr class="'+$class+'">'+
                '<td class="jsgrid-align-center">'+(i+1)+'</td>'+
                '<td name="title" class="jsgrid-align-center">'+$data[i]['title']+'</td>'+
                '<td name="image" class="jsgrid-align-center">'+
                    '<img src="'+url_resource+$data[i]['avatar']+'" width="40px" >'+
                '</td>'+
                '<td>'+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="edit btn btn-xs btn-info"><i class="fa fa-edit" aria-hidden="true" title="Edite"></i></a>'+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="delete btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>'+
                '</td>'+
                '</tr>';
            if($class == "jsgrid-row")$class = "jsgrid-alt-row";
            else $class = "jsgrid-row";
        }
        $("tbody#body-data").prepend($tbody);
    }

    function updateDataToEditingRow($tr_class,$data){
        var url_resource = "<?php echo asset("/");?>";
        $tr_class.find("td[name=title]").html($data.title);
        $tr_class.find("td[name=image] img").attr("src",url_resource+$data.avatar);
    }

    /*
    *   cancel button update
    */
    function clearFormData() {
        //remove class row_eding of tr
        $("table tr.row_editing").removeClass("row_editing");
        $("h4#form-header-title").html("Create Child Category");
        //specail needed for process data
        $("input[type=hidden]#form-type").val("add");
        $("#form-add-edit-child-category").trigger("reset");
        $("#image_previewing").attr("src","{{Config::get('constants.assets.backendTemplate')}}images/ic_coverThumbnail.png");
        $("div.action_button").html(
                '<button class="btn btn-success" type="submit" name="create">Add<i class="mdi-content-send right"></i></button>'
            );
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
            url: "{{route('api.getAllSubCategoriesWithLimitOffset')}}",
            data: {
                "currentDate" : currentDate,
                "limit" : limit,
                "offset" : offset
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
                    //remove button loadmore or not
                    if(dic.data.isloadmore == "0"){
                        $("div#load-more-position").html("");
                    }
                    //append datas to table
                    appendDataToTableBody(dic.data.subcategories);
                }
            }
        });
    });

    function appendDataToTableBody($data){
        var url_resource = "<?php echo asset("/");?>";
        $tbody = "";
        $class = "jsgrid-row";
        for (i = 0; i < $data.length; i++) {
            $tbody += '<tr class="'+$class+'">'+
                '<td class="jsgrid-align-center">'+(i+1)+'</td>'+
                '<td name="title">'+$data[i]['title']+'</td>'+
                '<td name="image">'+
                    '<img src="'+url_resource+$data[i]['avatar']+'" width="40px" >'+
                '</td>'+
                '<td>'+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="edit btn btn-xs btn-info"><i class="fa fa-edit" aria-hidden="true" title="Edite"></i></a>'+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="delete btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>'+
                '</td>'+
                '</tr>';
            if($class == "jsgrid-row")$class = "jsgrid-alt-row";
            else $class = "jsgrid-row";
        }
        $("tbody#body-data").append($tbody);
    }

    /*
    *   Edit button of each row
    */
    $(document).on('click','a.edit', function(){
        var id    = $(this).attr('name');
        //row of table which grand parent of this a.edit
        var tr    = $(this).parent().parent();

        $.ajax({
            type: "POST",
            url: "{{route('api.get.getSubcategoryById')}}",
            data: {
                'id' : id
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
                    mappingDataToEditForm(tr,dic.data);

                }
            }
        });
    });

    function mappingDataToEditForm($tr,$data){
        //open form
        $("#row-form").show(1500);
        $("#assistant-label").html("Close");
        $("a#add-assistant-button").find("i").removeClass("fa fa-plus-circle");
        $("a#add-assistant-button").find("i").addClass("fa fa-minus");

        $id     = $data.id;
        $title  = $data.title;
        $image  = "<?php echo asset("/");?>"+$data.avatar;
        $supercategories_id = $data.supercategories_id;

        //add class to the row parent'a.edit to forcus row edit
        $("tr.row_editing").removeClass("row_editing");
        $tr.addClass("row_editing");

        //change form add to update and field data to all field
        $("h4#form-header-title").html("UPDATE");
        //special need for process data
        $("input[type=hidden]#form-type").val("edit");

        $("div.action_button").html(
                '<input type="hidden" id="categoryId" name="cateId" value="'+$id+'" />'+
                '<button class="btn btn-success" type="submit" name="update" >Update</button>'+
                '<button id="cancel-button" onclick="clearFormData()" class="btn btn-default" type="button" style="margin-right:5px">Cancel</button>'
            );

        if($title != ""){
            $("#title").val($title);
            $("label[for=title]").addClass("active");
        }

        $("select#select-category").val($supercategories_id);

        $("#image_previewing").attr("src",$image);
        $("input[type=file]").val("");
        $("input.file-path").val("");
    }

    /*
    *   delete from each row
    */
    $(document).on('click','a.delete', function(){
        var tr    = $(this).parent().parent();
        var id    = $(this).attr('name');
        //alert(id);

        swal({  title: "Are you sure?",
                text: "The belongs categories will be detete!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    type: "POST",
                    url: "{{route('api.delete.subcategory')}}",
                    data: {
                        "id" : id
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
                            swal("Deleted!", dic.data.title+" has been deleted", "success");
                            tr.remove();
                        }
                    }
                });
            }
        );
    });

    /*
    *   supercategory select event to get all subcategories and show in table
    */
    $('select#select-category-show-list').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var id = this.value;
        var url = "{{route('api.get.subcategoryBySuperId')}}"
        if(id == ""){
            url = "{{route('api.get.getAllSubCategories')}}"
        }

        $.ajax({
            type: "POST",
            url: url,
            data: {
                'supercategory_id' : id
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
                    //eleminate load more button
                    $("div#load-more-position").html("");
                    mappingDataToTable(dic.data);
                }
            }
        });
    });

    function mappingDataToTable($data){
        var url_resource = "<?php echo asset("/");?>";
        $tbody = "";
        $class = "jsgrid-row";
        for (i = 0; i < $data.length; i++) {
            $tbody += '<tr class="'+$class+'">'+
                '<td>'+(i+1)+'</td>'+
                '<td name="title">'+$data[i]['title']+'</td>'+
                '<td name="image">'+
                    '<img src="'+url_resource+$data[i]['avatar']+'" width="40px" >'+
                '</td>'+
                '<td>'+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="edit btn btn-xs btn-info"><i class="fa fa-edit" aria-hidden="true" title="Edite"></i></a>'+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="delete btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>'+
                '</td>'+
                '</tr>';
            if($class == "jsgrid-row")$class = "jsgrid-alt-row";
            else $class = "jsgrid-row";
        }
        $("tbody#body-data").html($tbody);
    }

</script>

@stop

@push('js')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"></script>
@endpush