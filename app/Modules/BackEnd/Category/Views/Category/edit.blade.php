@extends('layouts.backend.layout')
@section('content')
<style>
    .img_current{width: 50px;}
    .img_anhphu{width: 50px;margin-bottom: 20px}
    .icon_del{position: relative;top:-75px;left: -30px;}
    #insert{margin-top: 20px;}
</style>
 <div id="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-md-6">
                <h4 class="breadcrumbs-title">Category update</h4>
                <br/>
            </div>
            <div  class="col-md-6">
                <div class="breadcrumbs-title" style="text-align:right">
                    <a id="assistant-label" class="normal-color-cursor" href="{{route('admin.category')}}">Back</a>
                    <a id="add-assistant-button" class="btn btn-primary" href="{{route('admin.category')}}"><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="rowAddCategory">
        <div class="col-md-12">
            <div class="panel panel-default" style="box-shadow:none">
                <h4 class="header2" id="form_create_category">Create Category</h4>
                <div class="row">
                   {!! Form::open(array('route'=>array('api.edit.category',$info['id']),'method'=>'patch','enctype'=>'multipart/form-data')) !!} 
                   {{-- <form class="col-md-12" id="form-add-edit-category"> --}}
                   
                      <div class="form-group">
                        <label>Category Parent</label>
                            <select class="form-control" id="select-category" name="sltParent">
                            <option value="0">Please Choose Category</option>
                            <!-- ====== function app/Http/Helpers.php ======= -->
                            <?php menuStore ($cate,0,"---|",$info['parent_id']); ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="txtCateName">Category Name*</label>
                                <input id="txtCateName" name="txtCateName" type="text" class="form-control" placeholder="Please Enter Category Name" value="{!! old('txtCateName',isset($info) ? $info['name'] : null) !!}">
                                <div class="errorTxt1"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txtOrdering">Category Order</label>
                                <input id="txtOrdering" name="txtOrdering" type="text" data-error=".errorTxt2" class="form-control" placeholder="Please Enter Category Order" value="{!! old('txtOrdering',isset($info) ? $info['ordering'] : null) !!}">
                                <div class="errorTxt2"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Images Current</label>
            
                            <img class="img_current" src="{!! asset('assets/uploads/category/'.$info['image']) !!}" />
                            <input type="hidden" name="img_current" value="{!! $info['image'] !!}" />
                            
                        </div>
                        <div class="form-group col-md-6">
                                <label>Images</label>
                                <input type="file" name="fImages" >
                            </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="txtDescription">Description</label>
                                <textarea id="txtDescription" name="txtDescription" class="form-control" rows="5" length="120">{!! old('txtDescription',isset($info) ? $info['description'] : null) !!}</textarea>
                            </div>
                            <div class="row">
                                <div class="pull-right">
                                    <div class="btn-group" id='action_button'>
                                        <button class="btn btn-success" type="submit" name="action">Update
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </form> --}}
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
    
   <script type="text/javascript">
   $(document).ready(function(){  
    $("#form-add-edit-category").validate({
        rules: {
            txtCateName: {
                required: true,
                minlength: 4
            },
            txtOrdering: {
                required: true,
                minlength: 1
            },
              
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
        }
   });
      
</script>

@stop

@push('js')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
@endpush
