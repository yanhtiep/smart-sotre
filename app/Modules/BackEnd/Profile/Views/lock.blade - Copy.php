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
<div class="container">
  <div id="login-page" class="col s12">
    <div class="col s12 m12 l12 z-depth-4 card-panel" style="height:600px !important;">
      <form class="login-form formValidate " id="formValidate" style="margin: 0 auto;">
      <input type="hidden" value="sendemail" id="sendemail"/>
        <div class="row" >
          <div class="input-field col s12 center">
            <?php
              $avatar = Config::get('constants.assets.backendTemplate').'images/avatar.jpg';

              if($dataProfile->avatar !="" ){
                $avatar =$dataProfile->avatar;
              }
            ?>
            <img src="{{ url($avatar)}}" alt="" class="circle responsive-img valign profile-image-login">
            <h4 class="header">{{ $dataProfile->username}}</h4>
            <input type="hidden" name="id" id="id" value="{{ $dataProfile->id }}" />
          </div>
        </div>
        <div class="row margin" id="formemail">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="email" type="email" data-error=".errorTxt1" name="email">
            <label for="email">Email</label>
            <div class="errorTxt1"></div>
          </div>
        </div>
        <div id="coonfirmcode" class="row margin">
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light col s12" id="changePassPro" type="submit">Login</button>
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
            '<div class="input-field col s12" id="codeconfirmform">'+
            '<i class="mdi-action-lock-outline"></i>'+
            '<input id="code" type="text" data-error=".errorTxt2" name="code" placeholder="code">'+
            '<label for="code">Code</label>'+
            '<div class="errorTxt1"></div>'+
            '</div>'
  $('#coonfirmcode').html(formconfirmcode);
  }
  function createChangePassForm(){
    $('#sendemail').val('changePass');
    var formchangepass =
          '<div class="input-field col s12">'+
            '<i class="mdi-action-lock-outline"></i>'+
            '<input id="password" type="password" data-error=".errorTxt3" name="password" placeholder="password">'+
            '<label for="password">password</label>'+
            '<div class="errorTxt3"></div>'+
            '</div>'+
            '<div class="input-field col s12">'+
            '<i class="mdi-action-lock-outline"></i>'+
            '<input id="cpassword" type="password" data-error=".errorTxt4" name="cpassword" placeholder="cpassword">'+
            '<label for="cpassword">Cpassword</label>'+
            '<div class="errorTxt4"></div>'+
            '</div>'
    $('#coonfirmcode').html(formchangepass);
  }
</script>
@stop
