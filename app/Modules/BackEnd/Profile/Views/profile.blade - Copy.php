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
   <section id="content-profile">
         <div id="profile-page" class="section">
            <!-- profile-page-header -->
            <div id="profile-page-header" class="card">
               <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="<?=$path?>/images/user-profile-bg.jpg" alt="user background">
               </div>
               <figure class="card-profile-image">
                  <?php
                    if ($dataProfile->avatar != ""){
                        $avatar = $dataProfile->avatar;
                    }else{
                      $avatar = Config::get('constants.assets.backendTemplate')."/images/user-profile-bg.jpg";
                    }
                  ;?>
                  <img src="{{url($avatar)}}" alt="profile image" class="circle z-depth-2 responsive-img activator">
               </figure>
               <div class="card-content">
                  <div class="row">
                     <div class="col s3 offset-s2">
                        <h4 class="card-title grey-text text-darken-4">{{ $dataProfile->username}}</h4>
                        <p class="medium-small grey-text">{{ $dataProfile->role }}</p>
                        <input type="text" value="{{ $dataProfile->id}}" id="user_id" hidden/>
                     </div>
                  </div>
               </div>
               <div class="card-reveal">
                  <p>
                     <span class="card-title grey-text text-darken-4">Roger Waters <i class="mdi-navigation-close right"></i></span>
                     <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Project Manager</span>
                  </p>
                  <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                  <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                  <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>
                  <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
                  <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> BAR - AUS</p>
               </div>
            </div>

            <!--/ profile-page-header -->
            <!-- profile-page-content -->
            <div id="profile-page-content" class="row">
               <!-- profile-page-sidebar-->
               <div id="profile-page-sidebar" class="col s12 m4">
                  <!-- Profile About  -->
                  <div class="card light-blue">
                     <div class="card-content white-text">
                        <span class="card-title">About Me!</span>
                        <p>{{ $dataProfile->description }}</p>
                     </div>
                  </div>
                  <!-- Profile About  -->
                  <!-- Profile About Details  -->
                  <ul id="profile-page-about-details" class="collection z-depth-1">
                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="mdi-action-perm-identity"></i>First Name</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->firstName }}</div>
                        </div>
                     </li>
                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="mdi-action-perm-identity"></i>Last Name</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->lastName }}</div>
                        </div>
                     </li>
                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="mdi-social-cake"></i> Birth date</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->dob }}</div>
                        </div>
                     </li>
                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="mdi-action-accessibility"></i>Gender</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->gender }}</div>
                        </div>
                     </li>
                  </ul>
                  <!--/ Profile About Details  -->
               </div>
               <!-- profile-page-sidebar-->
               <!-- profile-page-wall -->
               <div id="profile-page-wall" class="col s12 m8">
                  <!-- profile-page-wall-share -->
                  <div id="profile-page-wall-share" class="row">
                     <div class="col s12">
                        <ul class="tabs tab-profile z-depth-1 light-blue">
                           <li class="tab col s3"><a class="white-text waves-effect waves-light active" href="#UpdateStatus"><i class="mdi-action-account-circle"></i>Contact Information</a>
                           </li>
                        </ul>
                        <ul id="profile-page-about-details" class="collection z-depth-1">
                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="mdi-action-perm-identity"></i>UserName</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->username }}</div>
                        </div>
                     </li>
                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="mdi-communication-email"></i>Email</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->email }}</div>
                        </div>
                     </li>
                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="mdi-hardware-phone-iphone"></i>Telephone</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->phone }}</div>
                        </div>
                     </li>
                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="mdi-action-accessibility"></i>Gender</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->gender }}</div>
                        </div>
                     </li>
                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="mdi-social-domain"></i> Lives in</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->address }}</div>
                        </div>
                     </li>

                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->facebook }}</div>
                        </div>
                     </li>

                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="fa fa-google-plus" aria-hidden="true"></i> Google G+</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->google }}</div>
                        </div>
                     </li>

                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->twitter }}</div>
                        </div>
                     </li>

                     <li class="collection-item">
                        <div class="row">
                           <div class="col s5 grey-text darken-1"><i class="fa fa-linkedin-square" aria-hidden="true"></i> Linkedin</div>
                           <div class="col s7 grey-text text-darken-4 right-align">{{ $dataProfile->linkedin }}</div>
                        </div>
                     </li>
                  </ul>
                  <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action" id="edit_profile">Edit Profile
                    <i class="mdi-content-send right"></i>
                  </button>
                </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </section>
   <div id="form_edit" style="display:none">
      <div class="card-panel" id="profie_edit_form">
<h4 class="header2">Edit Profile</h4>
<div class="row" >
   <form class="col s12 formValidate" id="formValidate">
      <div class="row">
         <div class="row col s12 m6">

            <div class="row">
               <div class="input-field col s12">
                  <input id="username" type="text" value="" name="username" placeholder="username" data-error=".errorTxt1" >
                  <label class="active" for="username">Username</label>
                  <div class="errorTxt1"></div>
               </div>
            </div>
            <input type="hidden" name="userId" id="userId" value="" />
            <div class="row">
               <div class="input-field col s12">
                  <input id="email_user" type="email" value="" name="email_user" placeholder="email_user" data-error=".errorTxt2">
                  <label for="email">Email</label>
                  <div class="errorTxt2"></div>
               </div>
            </div>

            <div class="row">
               <div class="col s12 m6">
                  <div id="image_preview" style="width: 100%;text-align:center" >
                      <img  id="image_previewing" src="{{ Config::get('constants.assets.backendTemplate') }}images/ic_coverThumbnail.png" style="height:210px;width:210px" alt="profil"/>
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

         </div>

         <div class="row col s12 m6">
            <div class="row">
               <div class="input-field col s12">
                  <input id="firstname" type="text" name="firstname" placeholder="firstname" value="" data-error=".errorTxt3">
                  <label for="firstname">First Name</label>
                  <div class="errorTxt3"></div>
               </div>
            </div>

            <div class="row">
               <div class="input-field col s12">
                  <input id="lastname" type="text" name="lastname" placeholder="lastname" value="" data-error=".errorTxt4">
                  <label for="lastname">Last Name</label>
                  <div class="errorTxt4"></div>
               </div>
            </div>

            <div class="row">
               <div class="input-field col s12">
                <input type="date" id="dob" name="dob" class="datepicker" placeholder="datepicker" value="" data-error=".errorTxt5">
                <label for="dob">DOB</label>
                <div class="errorTxt5"></div>
              </div>
            </div>

            <div class="row">
              <div class="col s12">
                <label for="genter_select" class="gender" name="gender">Gender *</label>

                  <p>
                    <input name="gender" type="radio" id="gender_male" value="Male"  name="gender"data-error=".errorTxt6" />
                    <label for="gender_male"> Male</label>
                  </p>
                  <p>
                      <input name="gender" type="radio" id="gender_female" value="Female" name="gender" />
                      <label for="gender_female" >Female</label>
                  </p>
                  <div class="input-field">
                      <div class="errorTxt6"></div>
                  </div>
              </div>

          </div>
         </div>
         <div class="row col s12 m12">

        <div class="input-field col s12">
          <input id="phone" type="text" placeholder="phone" value="" name="phone">
          <label for="phone">Phone</label>
        </div>

        <div class="input-field col s12">
          <input id="address" type="text" placeholder="address" value="" name="address">
          <label for="address">Address</label>
        </div>

        <div class="input-field col s12">
          <input id="facebook" type="text" value="" name="facebook" placeholder="facebook">
          <label for="facebook">Facebook</label>
        </div>

        <div class="input-field col s12">
          <input id="google" type="text" value="" name="google" placeholder="google">
          <label for="google">Google</label>
        </div>

        <div class="input-field col s12">
          <input id="twitter" type="text" value="" name="twitter" placeholder="twitter">
          <label for="twitter">Twitter</label>
        </div>

        <div class="input-field col s12">
          <input id="linkedin" type="text" value="" name="linkedin" placeholder="linkedin">
          <label for="linkedin">Linkedin</label>
        </div>
        <div class="input-field col s12">
            <button class="btn cyan waves-effect waves-light right" type="submit" name="action" id="update_profile">Update
              <i class="mdi-content-send right"></i>
            </button>

            <button id="cancel-button" class="btn red waves-effect waves-light darken-4 right" type="button" style="margin-right:5px">Cancel</button>
        </div>
      </div>
      </div>
   </form>
</div>
</div>
</div>
</div>
<!-- chartist -->
<?php $path = Config::get('constants.assets.backendTemplate'); ?>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">
  $(document).on('click','#edit_profile',function(){
    var id = $('#user_id').val();
    $.ajax({
            type: "POST",
            url: "{{ route('api.profile.edit') }}",
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
                  $('#form_edit').show();
                  var username = $('#username').val(dic.data.username);
                  var firstname = $('#firstname').val(dic.data.firstName);
                  var lastname = $('#lastname').val(dic.data.lastName);
                  var email = $("#email_user").val(dic.data.email);
                  //var gender = $('#gender').val(dic.data.gender);
                  if (dic.data.gender == "Male"){
                       $('#gender_male').attr( "checked",true);
                  }else{
                       $('#gender_female').attr( "checked",true );
                  }

                   if (dic.data.avatar != ""){
                    $('#fileImage').attr("src",dic.data.avatar);
                    $('#image_previewing').attr("src",document.location.origin+'/'+dic.data.avatar);
                   }
                  var phone = $('#phone').val(dic.data.phone);
                  var address = $('#address').val(dic.data.address);
                  var facebook = $('#facebook').val(dic.data.facebook);
                  var google = $('#google').val(dic.data.google);
                  var twitter = $('#twitter').val(dic.data.twitter);
                  var linkedin = $('#linkedin').val(dic.data.linkedin);
                  var id = $('#userId').val(dic.data.id);
                  var dob = $('#dob').val(dic.data.dob);
                  $('#content-profile').hide();
                }
            }
        });
  });

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
  $(document).on('click','#cancel-button',function(){
     $('#content-profile').show()
     $('#form_edit').hide('');
  });

  $("#formValidate").validate({
        rules: {
            firstname: {
                required: true,
                minlength: 4
            },
            lastname: {
                required: true,
                minlength: 2
            },
            email_user: {
                required: true,
                email:true
            },
            password: {
        required: true,
        minlength: 5
      },
      phone: {
        required: true,
        number:true
      }
        },
        //For custom messages
        messages: {
            firstname:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            },
            lastname:{
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
          $.ajax({
              url: "{{route('api.profile.update')}}",
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
                      $('#form_edit').hide('');
                       $('#content-profile').show()
                      // alert(dic.data.name);
                      // clearDataForm();
                      // createTable(dic.data);
                  }
              },
              cache: false,
              contentType: false,
              processData: false
          });

        }

    });
</script>
@stop
