@extends('layouts.backend.layout')
@section('content')
<?php $path = Config::get('constants.assets.backendTemplate'); ?>
<!--jsgrid css-->
<link href="{{$path}}js/plugins/jsgrid/css/jsgrid.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?=$path?>js/plugins/jsgrid/css/jsgrid-theme.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
<link href="<?=$path?>js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">  
<!--sweetalert -->
<script type="text/javascript" src="<?=$path?>js/plugins/sweetalert/sweetalert.min.js"></script>
<!-- chartist -->
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/additional-methods.min.js"></script>

<div id="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l9">
                <h5 class="breadcrumbs-title">Shipping</h5>
                <br/>
            </div>
            <div  class="col s12 m4 l3">
                <div class="breadcrumbs-title" style="text-align:right">
                    <a id="assistant-label" class="normal-color-cursor">Create new shipping</a>
                    <a id="add-assistant-button" class="btn-floating un-rotate"><i class="mdi-content-add"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- this id="row-form" use for toggle form to be hide or show -->
    <div class="row" id="row-form"> 
        <div class="col s12 m12 l12">
            <div class="card-panel" style="-webkit-box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);">
                <h4 class="header2" id="form-header-title">Create shipping</h4> 
                <div class="row">
                    <form class="col s12 formAddShippingValidate" id="formAddShippingValidate">
                        <!-- this id="form-type" to specify form is creat form or update form by value "add" or "edit" -->
                        <input type="hidden" id="form-type" value="add" />
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="title" name="title" type="text" data-error=".errorTxt1">
                                <label for="title">Title*</label>
                                <div class="errorTxt1"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m6">
                                <div id="icon_preview" style="width: 100%;text-align:center">
                                    <img  id="icon_previewing" src="{{Config::get('constants.assets.backendTemplate')}}images/ic_coverThumbnail.png" style="height:90px;width:90px" />
                                </div>
                                <br/>
                                <div id="icon_message" style="text-align:center"></div>
                                <div class="file-field input-field">
                                    <div class="btn cyan">
                                        <span>Icon</span>
                                        <input type="file" name="fileIcon" id="fileIcon"/>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload Icon">
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m6">
                                <div id="image_preview" style="width: 100%;text-align:center">
                                    <img  id="image_previewing" src="{{Config::get('constants.assets.backendTemplate')}}images/ic_coverThumbnail.png" style="height:90px;width:90px" />
                                </div>
                                <br/>
                                <div id="image_message" style="text-align:center"></div>
                                <div class="file-field input-field">
                                    <div class="btn cyan">
                                        <span>Image</span>
                                        <input type="file" name="fileImage" id="fileImage"/>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload Image">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                                <!-- class="action_button" is create to be change sub element by following the type of form.
                                    if create -> we will generate only button add but
                                    if update -> we will generate two button update and cancel(this cancel will trigger reset all fields and generate button add to be create form)
                                -->
                                <div class="input-field col s12 action_button">
                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="create">add
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
    <div class="row"> 
        <div class="col s12 m12 l12">
            <div id="jsGrid-static" class="jsgrid" style="position: relative; height: 70%; width: 100%;-webkit-box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);">
                <!-- thead -->
                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                    <a id="pull-to-refresh" class="btn-floating grey"><i class="mdi-action-cached Medium"></i></a>
                    <div class="tooltip">Refresh</div> 
                          <!-- this date use for operation load more(limit offset) and refresh -->
                    <input type="hidden" id="currentDate" name="currentDate" value="{{$currentDate}}">
                </div>
                <!-- tbody -->
                <div class="jsgrid-grid-body jsgrid-header-scrollbar" style="height: 770px;">
                    <table class="jsgrid-table" style="width: 100%;">
                        <thead>
                            <tr class="jsgrid-header-row" >
                                <th class="jsgrid-header-sortable" style="width: 30px;">No.</th>
                                
                                <th class="jsgrid-header-sortable" style="width: 370px;">Name</th>
                                
                                <th class="jsgrid-header-sortable" style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="body-data">
                            <!-- table body goes here-->
                            <?php 
                                $class = "jsgrid-row";
                                $i = 0;
                            ?>
                            @foreach($shippings as $shipping)
                                <?php $ship = (object) $shipping; ?>
                                <tr class="{{$class}}">
                                    <td name="no" class="jsgrid-align-center">{{++$i}}</td>
                                   
                                    <td name="title" class="jsgrid-align-center">
                                        {{$ship->name}}
                                    </td>
                                    <td class="jsgrid-align-center" style="width: 100px;font-size:20px">
                                        <a style="cursor:pointer" name="{{$ship->id}}" class="edit mdi-content-create"></a> | 
                                        <a style="cursor:pointer" name="{{$ship->id}}" class="delete mdi-action-delete"></a>
                                    </td>
                                </tr>
                                <?php $class = (($class == "jsgrid-row") ? "jsgrid-alt-row" : "jsgrid-row");?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>
    <div class="row"> 
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
</div>

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

        //hide form before
        $("#row-form").toggle();
        $("a#add-assistant-button").click(function(){
            var label_name = $("#assistant-label").html();
            if(label_name == "Close Form"){
                //to clear data evenif it is edit form
                clearFormData();
                $("#assistant-label").html("Create Shipping");
                $(this).find("i").removeClass("mdi-navigation-close");
                $(this).find("i").addClass("mdi-content-add");
            }
            else{
                $("#assistant-label").html("Close Form");
                $(this).find("i").removeClass("mdi-content-add");
                $(this).find("i").addClass("mdi-navigation-close");
            }
            $("#row-form").toggle(1500);
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
            $("#row-form").toggle(1500);
        });
    });

    /*
    *   validate add form and perform create category or update
    */
    $("#formAddShippingValidate").validate({
        rules: {
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
            var formData = new FormData($("#formAddShippingValidate")[0]);
            var url = "";

            if(form_type == 'add'){
                url = "{{route('api.add.supercategory')}}";
                formData.append('currentDate', $("input#currentDate").val());
            }
            else if(form_type == 'edit'){
                url = "{{route('api.edit.supercategory')}}";
                formData.append('id', $("input[type=hidden]#categoryId").val());
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                async: false,
                enctype: 'multipart/form-data',
                success: function (data) {
                    //alert(data);
                    var dic = JSON.parse(data);
                    if(dic.code == 0){
                        swal({
                            title: "Oop!",
                            text: dic.message,
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
                            prependDatasToTable(dic.data.newSupercategories);
                            clearFormData();
                        }
                        else if(form_type == 'edit'){
                            var data = dic.data;
                            swal("Successed!", "Update completed!", "success");
                            updateDataToEditingRow($("table > tbody  > tr.row_editing"),data);
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

    function appendDataToTablePrepend($data){
        var url_resource = "<?php echo asset("/");?>";
        $("tbody#body-data").prepend(
                                '<tr class="jsgrid-row">'+
                                    '<td class="jsgrid-align-center">{{++$i}}</td>'+
                                    '<td name="title" class="jsgrid-align-center">'+
                                        $data.name+
                                    '</td>'+
                                    '<td class="jsgrid-align-center" style="width: 100px;font-size:20px">'+
                                        '<a style="cursor:pointer" name="'+$data.id+'" class="edit mdi-content-create"></a> | '+
                                        '<a style="cursor:pointer" name="'+$data.id+'" class="delete mdi-action-delete"></a>'+
                                    '</td>'+
                                '</tr>'
            );
    }

    function updateDataToEditingRow($tr_class,$data){
        var url_resource = "<?php echo asset("/");?>";
        $tr_class.find("td[name=name]").html($data.name);
       
    }

    /*
    *   Editbutton of each row
    */
    //$("a.edit").click(function(e){
    $(document).on('click','a.edit', function(){
        //open form
        $("#row-form").show(1500);
        $("#assistant-label").html("Close");
        $("a#add-assistant-button").find("i").removeClass("mdi-content-add");
        $("a#add-assistant-button").find("i").addClass("mdi-navigation-close");

        var tr      = $(this).parent().parent();
        $id    = $(this).attr('id');
        $name      = $.trim(tr.find("td[name=name]").html());
        //add class to the row parent'a.edit to forcus row edit
        $("table tr.row_editing").removeClass("row_editing");
        tr.addClass("row_editing");

        //change form add to update and field data to all field
        $("input[type=hidden]#form-type").val("edit");
        $("h4#form-header-title").html("UPDATE");
        $("div.action_button").html(
                '<input type="hidden" id="categoryId" name="cateId" value="'+$cate_id+'" />'+
                '<button class="btn cyan waves-effect waves-light right" type="submit" name="update" >Update</button>'+
                '<button id="cancel-button" onclick="clearFormData()" class="btn red waves-effect waves-light darken-4 right" type="button" style="margin-right:5px">Cancel</button>'
            );
        if($name != ""){
            $("#title").val($title);
            $("label[for=title]").addClass("active");   
        }
        if($desc != ""){
            $("#description").val($desc);
            $("label[for=message]").addClass("active");
        }
        
        $("#icon_previewing").attr("src",tr.find("td[name=icon] img").attr("src"));
        $("#image_previewing").attr("src",tr.find("td[name=image] img").attr("src"));
        $("input[type=file]").val("");
        $("input.file-path").val("");
    });

    /*
    *   cancel button update
    */
    function clearFormData() {
        //remove class row_eding of tr
        $("table tr.row_editing").removeClass("row_editing");

        $("input[type=hidden]#form-type").val("add");
        $('#formAddShippingValidate').trigger("reset");
        $("#icon_previewing").attr("src","{{Config::get('constants.assets.backendTemplate')}}images/ic_coverThumbnail.png");
        $("#image_previewing").attr("src","{{Config::get('constants.assets.backendTemplate')}}images/ic_coverThumbnail.png");
        $("div.action_button").html(
                '<button class="btn cyan waves-effect waves-light right" type="submit" name="create">add<i class="mdi-content-send right"></i></button>'
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
            url: "{{route('api.getAllSuperCategoriesWithLimitOffset')}}",
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
                    appendDataToTableBody(dic.data.supercategories);
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
                '<td name="icon" class="jsgrid-align-center">'+
                    '<img src="'+url_resource+$data[i]['icon']+'" width="40px" >'+
                '</td>'+
                '<td name="title" class="jsgrid-align-center">'+$data[i]['title']+'</td>'+
                '<td name="image" class="jsgrid-align-center">'+
                    '<img src="'+url_resource+$data[i]['avatar']+'" width="40px" >'+
                '</td>'+
                '<td class="jsgrid-align-center" style="font-size:20px">'+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="edit mdi-content-create"></a> | '+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="delete mdi-action-delete"></a>'+
                '</td>'+
                '</tr>';
            if($class == "jsgrid-row")$class = "jsgrid-alt-row";
            else $class = "jsgrid-row";
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
            url: "{{route('api.refreshSuperCategories')}}",
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
                    prependDatasToTable(dic.data.newSupercategories);
                }
            }
        });
    });

    function prependDatasToTable($data){
        var url_resource = "<?php echo asset("/");?>";
        $tbody = "";
        $class = "jsgrid-row";
        for (i = 0; i < $data.length; i++) {
            $tbody += '<tr class="'+$class+'">'+
                '<td class="jsgrid-align-center">'+(i+1)+'</td>'+
                '<td name="icon" class="jsgrid-align-center">'+
                    '<img src="'+url_resource+$data[i]['icon']+'" width="40px" >'+
                '</td>'+
                '<td name="title" class="jsgrid-align-center">'+$data[i]['title']+'</td>'+
                '<td name="image" class="jsgrid-align-center">'+
                    '<img src="'+url_resource+$data[i]['avatar']+'" width="40px" >'+
                '</td>'+
                '<td class="jsgrid-align-center" style="font-size:20px">'+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="edit mdi-content-create"></a> | '+
                    '<a style="cursor:pointer" name="'+$data[i]['id']+'" class="delete mdi-action-delete"></a>'+
                '</td>'+
                '</tr>';
            if($class == "jsgrid-row")$class = "jsgrid-alt-row";
            else $class = "jsgrid-row";
        }
        $("tbody#body-data").prepend($tbody);
    }

    /*
    *   delete from each row
    */
    $(document).on('click','a.delete', function(){
        var tr    = $(this).parent().parent();
        var id    = $(this).attr('name');

        swal({  title: "Are you sure?",
                text: "The belongs categories will detete!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                closeOnConfirm: false 
            }, 
            function(){   
                $.ajax({
                    type: "POST",
                    url: "{{route('api.delete.supercategory')}}",
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


</script>

@stop