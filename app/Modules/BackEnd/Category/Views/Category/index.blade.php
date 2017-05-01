@extends('layouts.backend.layout')
@section('content')
 <div id="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-md-6">
                <h4 class="breadcrumbs-title">Category management</h4>
                <br/>
            </div>
            <div  class="col-md-6">
            <div class="breadcrumbs-title" style="text-align:right">
                <a id="assistant-label" class="normal-color-cursor">Create Category</a>
                <a id="add-assistant-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
        </div>
    </div>
<div class="row" id="rowAddCategory">
        <div class="col-md-12">
            <div class="panel panel-default" style="box-shadow:none">
                <h4 class="header2" id="form_create_category">Create Category</h4>
                <div class="row">
                <form class="col-md-12" id="form-add-edit-category">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <input type="hidden" name="add" id="add" class="add" value="add" />
                      <div class="form-group">
                        <label>Category Parent</label>
                            <select class="form-control" id="select-category" name="sltParent">
                            <option value="0">Please Choose Category</option>
                            <?php menuStore ($data,0,$str="---|",old('sltParent')); ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="txtCateName">Name*</label>
                                <input id="txtCateName" name="txtCateName" type="text" class="form-control" placeholder="Please Enter Category Name" value="{!! old('txtCateName') !!}" />
                                <div class="errorTxt1"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txtOrdering">Order</label>
                                <input id="txtOrdering" name="txtOrdering" type="text" data-error=".errorTxt2" class="form-control" placeholder="Please Enter Category Order">
                                <div class="errorTxt2"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <input type="file" name="fImages">
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="txtDescription">Description</label>
                                <textarea id="txtDescription" name="txtDescription" class="form-control" rows="5" length="120"></textarea>
                            </div>
                            <div class="row">
                                <div class="pull-right">
                                    <div class="btn-group" id='action_button'>
                                        <button class="btn btn-success" type="submit" name="action" id="refresh">Add
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
                    {{-- <input type="hidden" id="currentDate" name="currentDate" value="{{ $currentDate }}"> --}}
                <div class="jsgrid-grid-header jsgrid-header-scrollbar"></div>

                <!-- tbody -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table class="table user_table" style="width: 100%;">
                        <thead>
                        <thead>
                            <tr class="jsgrid-header-row" align="center">
                                <th class="jsgrid-header-sortable" style="width: 30px;">No.</th>
                                <th class="jsgrid-header-sortable" style="width: 120px;">Name</th>
                                <th class="jsgrid-header-sortable" style="width: 10px;">Category Parent</th>
                                <th class="jsgrid-header-sortable" style="width: 120px;">Status</th>
                                <th class="jsgrid-header-sortable" style="width: 50px;">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody id="body-data">
                            <?php $stt = 0 ?>
                        @foreach ($data as $item)
                             <?php $stt = $stt + 1 ?>
                            <tr class="odd gradeX" >
                                <td>{!! $stt !!}</td>
                                <td>{!! $item["name"] !!}</td>
                                <td>
                                    @if ($item["parent_id"] == 0)
                                        {!! "None" !!}
                                    @else
                                        <?php
                                           $parent = DB::table('categories')->where('id',$item["parent_id"])->first();
                                           echo $parent->name;
                                        ?>
                                    @endif
                                </td>
                                <td>{!! $item["status"] !!}</td>
                                    <td >
                                    <a href="{{route('admin.category-edit',$item['id'])}}" name="" class='edit_category btn btn-xs btn-info' style="cursor:pointer;">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a> | 
                                    <a onclick= "return youwantdelete('Are you sure you want to delete ?')" href="{{route('admin.category-delete',$item['id'])}}" name="" class="delete_user btn btn-xs btn-danger" style="cursor:pointer;">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                      </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $data->render() !!}
                </div>
                </div>
            </div>
        </div>

    </div>
</div>
     <script type="text/javascript">
    
   $(document).ready(function(){
     //hide form before
        $("#rowAddCategory").toggle();
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
    $("#form-add-edit-category").validate({
        rules: {
            txtCateName: {
                required: true,
                minlength: 4
            },
            txtOrdering: {
                required: true,
                minlength: 1
            }
              
        },
        //For custom messages
        messages: {
            txtCateName:{
                required: "Enter a Category Name",
                minlength: "Enter at least 5 characters"
            },
            txtOrdering:{
                required: "Enter a ordering name",
                minlength: "Enter at least 2 characters"
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
            var formData = new FormData($("#form-add-edit-category")[0]);
            var url = "{{route('api.add.category')}}";

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
    $( "#refresh" ).click(function() {setTimeout(function() {
            location.reload();
        },3000);
    });
    /*
    *hide form create category
    *
    */

    $("#rowAddCategory").hide();
    $("#add-assistant-button").click(function(){
        $("#rowAddCategory").toggle(1500);

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
