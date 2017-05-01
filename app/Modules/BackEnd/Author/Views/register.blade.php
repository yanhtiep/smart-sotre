<?php $path = Config::get('constants.assets.backendTemplate'); ?>

        <!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">

    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Login Page | Online Store</title>

    <!-- Favicons-->
    <link rel="icon" href="<?=$path?>images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?=$path?>images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<?=$path?>images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->

    <link href="<?=$path?>css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=$path?>css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="<?=$path?>css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=$path?>css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?=$path?>js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=$path?>js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body class="cyan">
<!-- Start Page Loading -->
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->



<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form"  method="post">
            <div class="row">
                <div class="input-field col s12 center">
                    <h4>Register</h4>
                    <p class="center">Join to our community now !</p>
                </div>
            </div>
            <div class="input-field col s12 center">{!! Session::has('msg') ? '<p style="color:#ff5a92;">'.Session::get('msg').'</p>' : '' !!}</div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input id="username" name="username" type="text">
                    <label for="username" class="center-align">Username</label>
                    {!! $errors->first('username', '<div class="help-block col-xs-12 col-sm-reset inline error" style="color:#ff5a92;">:message</div>') !!}
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-communication-email prefix"></i>
                    <input id="email" name="email" type="email">
                    <label for="email" class="center-align">Email</label>
                    {!! $errors->first('email', '<div class="help-block col-xs-12 col-sm-reset inline error" style="color:#ff5a92;">:message</div>') !!}
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="password" name="password" type="password">
                    <label for="password">Password</label>
                    {!! $errors->first('password', '<div class="help-block col-xs-12 col-sm-reset inline error" style="color:#ff5a92;">:message</div>') !!}
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="password-again" name="con_password" type="password">
                    <label for="password-again">Password again</label>
                    {!! $errors->first('con_password', '<div class="help-block col-xs-12 col-sm-reset inline error " style="color:#ff5a92;">:message</div>') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button  class="btn waves-effect waves-light col s12">Register Now</button>
                </div>
                <div class="input-field col s12">
                    <p class="margin center medium-small sign-up">Already have an account? <a href="{{route('admin.login')}}">Login</a></p>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- ================================================
  Scripts
  ================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="<?=$path?>js/plugins/jquery-1.11.2.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="<?=$path?>js/materialize.min.js"></script>
<!--prism-->
<script type="text/javascript" src="<?=$path?>js/plugins/prism/prism.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="<?=$path?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="<?=$path?>js/plugins.min.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="<?=$path?>js/custom-script.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
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
         
          }
            $.ajax({
                url: "{{ route('api.users.register') }}",
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
                      location.reload();
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });

        }

    });
    });
</script>
</body>

</html>