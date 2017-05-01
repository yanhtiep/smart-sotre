@extends('layouts.backend.layout')
@section('content')
 <div id="breadcrumbs-wrapper">
    <div class="row">
        <div class="col-md-6">
            <h4 class="breadcrumbs-title">Advertsite management</h4>
            <br/>
        </div>
        <div  class="col-md-6">
            <div class="breadcrumbs-title" style="text-align:right">
                <a id="assistant-label" class="normal-color-cursor">Create advertise</a>
                <a id="add-assistant-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
    </div>
</div>

    <div class="row" id="rowAddAdv">
    <div class="col-md-12">
        <div class="panel panel-default">
           <!--  <h4 class="header2" id="form_create_user">Create Adver</h4> -->
            <div class="row">
                <form class="col-md-12 formAddAdvertiseValidate" id="formAddAdvertiseValidate">
                    <input type="hidden" id="form-type" value="add" />
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Customer name</label>
                                <input id="name" name="name" type="text" data-error=".errorTxt1" class="form-control">
                                <div class="errorTxt1"></div>
                            </div>
                            <div class="form-group col-md-6">
                                 <label for="phone">Phone</label>
                                <input id="phone" type="text" name="phone" data-error=".errorTxt2" class="form-control">
                                 <div class="errorTxt2"></div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="expridate">Expri date<sup>*</sup></label>
                                 <input class="form-control" id="expridate" name="expridate"
                                placeholder="mm/dd/yyyy" type="text">
                                 <div class="errorDate"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="url">Website<sup>*</sup></label>
                                 <input id="url" name="url" name="url" type="text" data-error=".errorTxt6" class="form-control">
                                 <div class="errorTxt6"></div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="form-group col-md-6">
                                <label for="url">Position<sup>*</sup></label>
                                 <select class="form-control" id="position_id" name="position_id" data-error=".errorTxt5">
                                            <option class="select-list-style" value="">Select position<sup>*</sup></option>
                                            <option class="select-list-style" value="top">Benner (200 x 100)</option>
                                            <option class="select-list-style" value="left">Left (150 x 150)</option>
                                            <option class="select-list-style" value="right">Right (150 x 150)</option>
                                        </select>
                                 <div class="errorTxt5"></div>
                             </div>
                              <div class="form-group col-md-6">
                                    <label for="url">Image<sup>*</sup></label>
                                    <div class="fallback">
                                        <input name="fileImage" type="file" id="fileImage" />
                                    </div>
                                    <div id="image_preview" style="width: 100%;text-align:center">
                                    <img  id="image_previewing" src="{{Config::get('constants.assets.backendTemplate')}}img/defaultimg/ic_coverThumbnail.png" style="height:90px;width:90px" />
                                    </div>
                                     <br/>
                                    <div id="image_message" style="text-align:center"></div>
                              </div>
                        </div>
                        <div class="row">
                            <div class="pull-right">
                                <button class="btn btn-success" type="submit" name="create">add
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                   Advertise
                </h3>
            </div>
             <div class="row" id="row-form">
                <div class="card-panel">
                    <input type="hidden" id="currentDate" name="currentDate" value="{{$currentDate}}">
                    <table class="table">
                        <thead>
                            <tr class="jsgrid-header-row" >
                               <th>No.</th>
                                <th>Name
                                </th>
                                <th>Phone</th>
                                <th>Website</th>
                                <th >Expri Date</th>
                                <th>Position</th>
                                <th>Ordering</th>
                                <th>Picture</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body-data">
                            <!-- table body goes here-->
                            <?php 
                                $class = "jsgrid-row";
                                $i = 0;
                            ?>
                            @foreach($advertises as $index => $advertise)
                                <?php $add = (object) $advertise; ?>
                                <tr class="{{$class}}">
                                    <td name="no">
                                       {{$index + 1}}
                                    </td>
                                    <td name="name">
                                         {{$add->cosName}}
                                    </td>

                                    <td name="phone">
                                        {{$add->cosPhone}}
                                    </td>
                                    
                                    <td name="url">
                                        <a href="{{$add->url}}" target="_blank">{{$add->url}}</a>
                                    </td>

                                    <td name="expridate">
                                        {{$add->expridate}}
                                    </td>

                                    <td name="position_id">
                                        {{$add->position_id}}
                                    </td>

                                    <td name="ordering">
                                        {{$add->ordering}}
                                    </td>

                                    <td name="image">
                                        <img src="{{asset($add->avatar)}}" width="40px" >
                                    </td>
                                    <td>
                                        <a style="cursor:pointer" name="{{$add->id}}" class="edit btn btn-xs btn-info">
                                            <i class="fa fa-edit" aria-hidden="true" title="Edite"></i>
                                        </a>
                                        <a style="cursor:pointer" name="{{$add->id}}" class="delete btn btn-xs btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $class = (($class == "jsgrid-row") ? "jsgrid-alt-row" : "jsgrid-row");?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col s12 m12 l12" style="text-align:left" id="load-more-position">
                <?php 
                    if($isLoadMore == 1){
                        echo '<button class="btn btn-danger" type="button" name="load-more">Load More
                    <i class="fa fa-spinner"></i>
                </button>';
                    }
                ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">

    $(document).ready(function() {

        $('#expridate').datepicker();

     /*
    *   validate add form and perform create category or update
    */
    $("#formAddAdvertiseValidate").validate({
        rules: {
            expridate:"required",
            position_id:"required",
            url: {
                required: true
            },
        },
        //For custom messages
        messages: {
            url:{
                required: "Please enter link"
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
        submitHandler: function(form) {//alert("hello");

            var form_type = $("input[type=hidden]#form-type").val();
            var formData = new FormData($("#formAddAdvertiseValidate")[0]);
            var url = "";

            if(form_type == 'add'){
                url = "{{route('api.add.advertise')}}";
                formData.append('currentDate', $("input#currentDate").val());
            }
            else if(form_type == 'edit'){
                url = "{{route('api.edit.advertise')}}";
                formData.append('id', $("input[type=hidden]#advertiseId").val());
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
                            prependDatasToTable(dic.data.newAdvertises);
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
        //hide form before
        $("#rowAddAdv").toggle();
        $("a#add-assistant-button").click(function(){
            var label_name = $("#assistant-label").html();
            if(label_name == "Close"){
                //to clear data evenif it is edit form
                clearFormData();
                $("#assistant-label").html("Create advertise");
                $(this).find("i").removeClass("fa fa-times-circle");
                $(this).find("i").addClass("fa fa-plus-circle");
            }
            else{
                $("#assistant-label").html("Close");
                $(this).find("i").removeClass("fa fa-plus-circle");
                $(this).find("i").addClass("fa fa-times-circle");
            }
            $("#rowAddAdv").toggle(1500);
        });
        $("#assistant-label").click(function(){
            var label_name = $(this).html();
            if(label_name == "Close"){
                //to clear data evenif it is edit form
                clearFormData();
                $(this).html("Create advertise");
                $("a#add-assistant-button").find("i").removeClass("mdi-navigation-close");
                $("a#add-assistant-button").find("i").addClass("fa fa-plus-circle");
            }
            else{
                $(this).html("Close");
                $("a#add-assistant-button").find("i").removeClass("fa fa-plus-circle");
                $("a#add-assistant-button").find("i").addClass("fa fa-times-circle");
            }
            $("#rowAddAdv").toggle(1500);
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


    function prependDatasToTable($data){
        var url_resource = "<?php echo asset("/");?>";
        $tbody = "";
        $class = "jsgrid-row";
        for (i = 0; i < $data.length; i++) {
            $tbody += '<tr class="'+$class+'">'+
                '<td class="jsgrid-align-center">'+(i+1)+'</td>'+
                '<td name="name" class="jsgrid-align-center">'+$data[i]["cosName"]+'</td>'+
                '<td name="phone" class="jsgrid-align-center">'+$data[i]["cosPhone"]+'</td>'+
                '<td name="url" class="jsgrid-align-center">'+
                    '<a href="'+$data[i]["url"]+'" target="_blank">'+$data[i]["url"]+'</a>'+
                '</td>'+
                '<td name="expridate" class="jsgrid-align-center">'+$data[i]["expridate"]+'</td>'+
                '<td name="position_id" class="jsgrid-align-center">'+$data[i]["position_id"]+'</td>'+
                '<td name="ordering" class="jsgrid-align-center">'+$data[i]["ordering"]+'</td>'+
                '<td name="image" class="jsgrid-align-center">'+
                    '<img src="'+url_resource+$data[i]["avatar"]+'" width="40px" >'+
                '</td>'+
                '<td class="jsgrid-align-center" style="font-size:20px">'+
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
        $tr_class.find("td[name=name]").html($data.cosName);
        $tr_class.find("td[name=phone]").html($data.cosPhone);
        $tr_class.find("td[name=url]").html('<a href="'+$data.url+'" target="_blank">'+$data.url+'</a>');
        $tr_class.find("td[name=position_id]").html($data.position_id);
        $tr_class.find("td[name=ordering]").html($data.ordering);
        $tr_class.find("td[name=expri]").html($data.expridate);
        $tr_class.find("td[name=image] img").attr("src",url_resource+$data.avatar);
    }

    /*
    *   cancel button update
    */
    function clearFormData() {
        //remove class row_eding of tr
        $("table tr.row_editing").removeClass("row_editing");
        $("h4#form-header-title").html("Create Advertise");
        //specail needed for process data
        $("input[type=hidden]#form-type").val("add");
        $("#formAddAdvertiseValidate").trigger("reset");
        $("select#position_id").val("");
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
            url: "{{route('api.advertises')}}",
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
                    appendDataToTableBody(dic.data.positions);
                }
            }
        });
    });

    function appendDataToTableBody($data){
       // console.log($data);
        var url_resource = "<?php echo asset("/");?>";
        $tbody = "";
        $class = "jsgrid-row";
        for (i = 0; i < $data.length; i++) {
            $tbody += '<tr class="'+$class+'">'+
                '<td class="jsgrid-align-center">'+(i+1)+'</td>'+
                '<td name="name" class="jsgrid-align-center">'+$data[i]['cosName']+'</td>'+
                '<td name="phone" class="jsgrid-align-center">'+$data[i]['cosPhone']+'</td>'+
                '<td name="url" class="jsgrid-align-center">'+
                    '<a href="'+$data[i]["url"]+'" target="_blank">'+$data[i]["url"]+'</a>'+
                '</td>'+

                '<td name="expridate" class="jsgrid-align-center">'+$data[i]['expridate']+'</td>'+
                 
                '<td name="position_id" class="jsgrid-align-center">'+$data[i]['position_id']+'</td>'+
                '<td name="ordering" class="jsgrid-align-center">'+$data[i]['ordering']+'</td>'+
                '<td name="image" class="jsgrid-align-center">'+
                    '<img src="'+url_resource+$data[i]['avatar']+'" width="40px" >'+
                '</td>'+
                '<td class="jsgrid-align-center" style="font-size:20px">'+
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
    *   Editbutton of each row
    */
    //$("a.edit").click(function(e){
    $(document).on('click','a.edit', function(){
        //open form
        $("#rowAddAdv").show(1500);
        $("#assistant-label").html("Close");
        $("a#add-assistant-button").find("i").removeClass("fa fa-plus-circle");
        $("a#add-assistant-button").find("i").addClass("fa fa-times-circle");

        var tr      = $(this).parent().parent();
        
        $id         = $(this).attr('name');
        $cosName    = $.trim(tr.find("td[name=name]").html());
        $cosPhone   = $.trim(tr.find("td[name=phone]").html());
        $url        = $.trim(tr.find("td[name=url] > a").html());
        $position_id= $.trim(tr.find("td[name=position_id]").html());
        $expridate  = $.trim(tr.find("td[name=expridate]").html());
        //add class to the row parent'a.edit to forcus row edit
        $("table tr.row_editing").removeClass("row_editing");
        tr.addClass("row_editing");

        //change form add to update and field data to all field
        $("input[type=hidden]#form-type").val("edit");
        $("h4#form-header-title").html("UPDATE");
        $("div.action_button").html(
                '<input type="hidden" id="advertiseId" name="addId" value="'+$id+'" />'+
                '<button class="btn btn-success" type="submit" name="update" >Update</button>'+
                '<button id="cancel-button" onclick="clearFormData()" class="btn btn-default" type="button" style="margin-right:5px">Cancel</button>'
            );
       
        if($cosName != ""){
            $("#name").val($cosName);
            $("label[for=name]").addClass("active");
        }

        if($cosPhone != ""){
            $("#phone").val($cosPhone);
            $("label[for=phone]").addClass("active");
        }

        if($expridate != ""){
            $("#expridate").val($expridate);
            $("label[for=expridate]").addClass("active");
        }

        if($position_id != ""){
            $("#position_id").val($position_id);
            //$("label[for=message]").addClass("active");
        }

        if($url != ""){
            $("#url").val($url);
            $("label[for=url]").addClass("active");   
        }

        $("#image_previewing").attr("src",tr.find("td[name=image] img").attr("src"));
        $("input[type=file]").val("");
        $("input.file-path").val("");
    });
   

    function mappingDataToEditForm($tr,$data){
        //open form
        $("#row-form").show(1500); 
        $("#assistant-label").html("Close");
        $("a#add-assistant-button").find("i").removeClass("fa fa-plus-circle");
        $("a#add-assistant-button").find("i").addClass("fa fa-times-circle");
        
        $id     = $data.id;
        $url  = $data.url;
        $image  = "<?php echo asset("/");?>"+$data.avatar;
        $superaddgories_id = $data.superaddgories_id;

        //add class to the row parent'a.edit to forcus row edit
        $("tr.row_editing").removeClass("row_editing");
        $tr.addClass("row_editing");

        //change form add to update and field data to all field
        $("h4#form-header-title").html("UPDATE");
        //special need for process data
        $("input[type=hidden]#form-type").val("edit");

        $("div.action_button").html(
                '<input type="hidden" id="addgoryId" name="addId" value="'+$id+'" />'+
                '<button class="btn cyan waves-effect waves-light right" type="submit" name="update" >Update</button>'+
                '<button id="cancel-button" onclick="clearFormData()" class="btn red waves-effect waves-light darken-4 right" type="button" style="margin-right:5px">Cancel</button>'
            );

        if($url != ""){
            $("#url").val($url);
            $("label[for=url]").addClass("active");   
        }

        $("select#select-addgory").val($superaddgories_id);
        
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
                    url: "{{route('api.delete.advertise')}}",
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
                            swal("Deleted!", "This advertise has been deleted", "success");
                            tr.remove();
                        }
                    }
                });
            }
        );
    });


</script>
@stop

@push('js')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
@endpush
