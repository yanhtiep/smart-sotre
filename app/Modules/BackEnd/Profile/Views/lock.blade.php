@extends('layouts.backend.layout')
@section('content')
<div class="container">
  <div id="login-page" class="wrapper-page animated fadeInDown">
    <div class="panel panel-color panel-primary">
      <form class="login-form formValidate " id="formValidate" style="margin: 0 auto;">
      <input type="hidden" value="sendemail" id="sendemail"/>
        <div class="row">
          <div class="user-thumb">
            <?php
              $avatar = Config::get('constants.assets.backendTemplate').'img/avatar-2.jpg';

              if($dataProfile->avatar !="" ){
                $avatar =$dataProfile->avatar;
              }
            ?>
            <img src="{{ url($avatar)}}" alt="" class="img-responsive img-circle thumb-lg">
            <div class="form-group">
            <h4 style="text-align: center;">{{ $dataProfile->username}}</h4>
            <input type="text" name="username" value="{{ $dataProfile->username }}" hidden="true">
              
            </div>
            <input type="hidden" name="id" id="id" value="{{ $dataProfile->id }}" />
          </div>
        </div>
        <div class="form-group" id="formemail">
          <div class="input-field col s12 form-group">
           <!--  <label for="email">Email</label>
            <i class="fa fa-envelope-o"></i> -->
            <input id="email" type="email" data-error=".errorTxt1" name="email" class="form-control" placeholder="your email">
            <div class="errorTxt1"></div>
          </div>
        </div>
        <div id="coonfirmcode" class="row margin">
        </div>
        <div class="row">
          <div class="form-group">
            <button class="btn btn-success" id="changePassPro" type="submit">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- chartist -->
<?php $path = Config::get('constants.assets.backendTemplate'); ?>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">
  $("#formValidate").validate({
    rules: {
      email: {
        required: true,
        email:true
      },
      password:{
        required:true,
        minlength: 5
      },
      cpassword:{
        required:true,
        minlength: 5,
        equalTo: "#password"
      }

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
      var formtype = $('#sendemail').val();
      var url = "";
      if(formtype == 'confirmcode'){
        url = "{{route('api.users.comfirmCode')}}";
      }else if (formtype == 'changePass') {
        url = "{{route('api.users.changePass')}}";
      }else {
        url = "{{route('api.profile.email')}}";
      }
      $.ajax({
          url: url,
          type: 'POST',
          data: formData,
          async: false,
          enctype: 'multipart/form-data',
          success: function (data) {
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
                  swal("Successed!", "Thanks!", "success");
                  if(formtype == 'confirmcode'){
                            swal({    title: "Successed",
                                text: "check your email for confirm code.",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#8cd4f5",
                                confirmButtonText: "OK",
                                closeOnConfirm: true },
                                function(){
                                    $('#codeconfirmform').hide();
                                    createChangePassForm();

                                }
                            );
                        }else if(formtype == 'changePass'){
                          swal({    title: "Successed",
                                text: "This password has been updated.",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#8cd4f5",
                                confirmButtonText: "OK",
                                closeOnConfirm: true },
                                function(){
                                    window.location.href = '{{ route("admin.profile") }}';

                                }
                          );
                        }else{
                             $('#formemail').hide();
                            createComfirmCodeForm();
                        }
              }
          },
          cache: false,
          contentType: false,
          processData: false
      });
    }
});

  function createComfirmCodeForm(){
    $('#sendemail').val('confirmcode');
    var formconfirmcode =
            '<div class="form-group" id="codeconfirmform">'+
            '<label for="code">Code</label>'+
            '<i class="fa fa-key"></i>'+
            '<input id="code" type="text" data-error=".errorTxt2" name="code" placeholder="code" class="form-control">'+
            '<div class="errorTxt1"></div>'+
            '</div>'
  $('#coonfirmcode').html(formconfirmcode);
  }
  function createChangePassForm(){
    $('#sendemail').val('changePass');
    var formchangepass =
          '<div class="form-group">'+
           '<label for="password">password</label>'+
            '<i class="fa fa-unlock-alt"></i>'+
            '<input id="password" type="password" data-error=".errorTxt3" name="password" placeholder="password" class="form-control">'+
            '<div class="errorTxt3"></div>'+
            '</div>'+
            '<div class="input-field col s12">'+
            '<label for="cpassword">Cpassword</label>'+
            '<i class="fa fa-unlock-alt"></i>'+
            '<input id="cpassword" type="password" data-error=".errorTxt4" name="cpassword" placeholder="cpassword" class="form-control">'+
            '<div class="errorTxt4"></div>'+
            '</div>'
    $('#coonfirmcode').html(formchangepass);
  }
</script>
@stop
@push('js')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script><script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.js"></script>
@endpush