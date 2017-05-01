<?php $path = Config::get('constants.assets.backendTemplate'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Login Page | Online Store</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?=$path;?>css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?=$path;?>font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="<?=$path;?>css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?=$path;?>css/ace.min.css" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/css/ace-part2.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="<?=$path;?>css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?=$path;?>sweet-alert/sweet-alert.min.css" />
        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

<body class="login-layout">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <i class="ace-icon fa fa-leaf green"></i>
                                <span class="red">Online</span>
                                <span class="white" id="id-text2">Store</span>
                            </h1>
                           
                        </div>
                        <div class="space-6"></div>
                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            Please Enter Your Information
                                        </h4>

                                        <div class="space-6"></div>

                                        <form class="login-form" action="{{route('admin.login')}}" method="post">
                                          <input type="hidden" value="sendemail" id="sendemail"/>
                                            <fieldset>

                                               
                                                @if (Session::get("msg"))
                                                    
                                                    <div class="alert alert-danger">
                                                        {!! Session::has('msg') ? Session::get("msg") : '' !!}
                                                     </div>
                                                @endif
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                         <input id="username" name="username" type="text" class="form-control" placeholder="Username">
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                     {!! $errors->first('username', '<div class="help-block col-xs-12 col-sm-reset inline " style="color:#ff5a92;">:message</div>') !!}
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                       <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                                        <i class="ace-icon fa fa-lock"></i>
                                                       
                                                    </span>
                                                     {!! $errors->first('password', '<div class="help-block col-xs-12 col-sm-reset inline" style="color:#ff5a92;">:message</div>') !!}
                                                </label>

                                                <div class="space"></div>

                                                <div class="clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> Remember Me</span>
                                                    </label>

                                                    <button  class="width-35 pull-right btn btn-sm btn-primary">
                                                        <i class="ace-icon fa fa-key"></i>
                                                        <span class="bigger-110">Login</span>
                                                    </button>
                                                </div>

                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>

                                        <div class="social-or-login center">
                                            <span class="bigger-110">Or Login Using</span>
                                        </div>

                                        <div class="space-6"></div>

                                        <div class="social-login center">
                                            <a href="{{route('admin.redirect')}}" class="btn btn-primary">
                                                <i class="ace-icon fa fa-facebook"></i>
                                            </a>

                                            <a href="{{route('autho.twitter.redirect')}}" class="btn btn-info">
                                                <i class="ace-icon fa fa-twitter"></i>
                                            </a>

                                            <a href="{{route('autho.linkedin.redirect')}}" class="btn btn-danger">
                                                <i class="ace-icon fa fa-linkedin"></i>
                                            </a>
                                             <a href="{{route('autho.google.redirect')}}" class="btn btn-danger">
                                                <i class="ace-icon fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div><!-- /.widget-main -->

                                    <div class="toolbar clearfix">
                                        <div>
                                            <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                I forgot my password
                                            </a>
                                        </div>

                                        <div>
                                            <a href="#" data-target="#signup-box" class="user-signup-link">
                                                I want to register
                                                <i class="ace-icon fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->

                            <div id="forgot-box" class="forgot-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header red lighter bigger">
                                            <i class="ace-icon fa fa-key"></i>
                                            Retrieve Password
                                        </h4>

                                        <div class="space-6"></div>
                                        <p>
                                            Enter your email and to receive instructions
                                        </p>

                                        <form>
                                            <fieldset>
                                                <label class="block clearfix" id="confirmemail">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="email" class="form-control" placeholder="Email" id="emailreset"/>
                                                        <i class="ace-icon fa fa-envelope"></i>
                                                    </span>
                                                </label>
                                                <label class="block clearfix" id="coonfirmcode">
                                                    
                                                </label>

                                                <div class="clearfix">
                                                    <button type="button" class="width-35 pull-right btn btn-sm btn-danger sendpass">
                                                        <i class="ace-icon fa fa-lightbulb-o"></i>
                                                        <span class="bigger-110">Send Me!</span>
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div><!-- /.widget-main -->

                                    <div class="toolbar center">
                                        <a href="#" data-target="#login-box" class="back-to-login-link">
                                            Back to login
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.forgot-box -->

                            <div id="signup-box" class="signup-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header green lighter bigger">
                                            <i class="ace-icon fa fa-users blue"></i>
                                            New User Registration
                                        </h4>

                                        <div class="space-6"></div>
                                        <p> Enter your details to begin: </p>

                                        <form class="login-form formValidate" id="formValidate">
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                      <input type="text" value="" id="userid" hidden="true"/>
                                                        <input id="email" name="email" type="email" placeholder="Email" class="form-control">
                                                        <i class="ace-icon fa fa-envelope"></i>
                                                    </span>
                                                    
                                                </label>
                                                
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                         <input id="username" name="username" type="text" placeholder="Username" class="form-control">
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input id="password_re" name="password" type="password" placeholder="Password" class="form-control">
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                         <input id="password-again" name="cpassword" type="password" placeholder="Repeat password" class="from-control">
                                                        <i class="ace-icon fa fa-retweet"></i>
                                                    </span>
                                                </label>

                                                <label class="block">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl">
                                                        I accept the
                                                        <a href="#">User Agreement</a>
                                                    </span>
                                                </label>

                                                <div class="space-24"></div>
                                                <div class="clearfix">
                                                    <button type="reset" class="width-30 pull-left btn btn-sm">
                                                        <i class="ace-icon fa fa-refresh"></i>
                                                        <span class="bigger-110">Reset</span>
                                                    </button>
                                                        <button type="submit" class="width-65 pull-right btn btn-sm btn-success">Register Now!</button>   
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="toolbar center">
                                        <a href="#" data-target="#login-box" class="back-to-login-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            Back to login
                                        </a>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.signup-box -->
                        </div><!-- /.position-relative -->

                        <div class="navbar-fixed-top align-right">
                            <br />
                            &nbsp;
                            <a id="btn-login-dark" href="#">Dark</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-blur" href="#">Blur</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-light" href="#">Light</a>
                            &nbsp; &nbsp; &nbsp;
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="<?=$path?>js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
        <script src="assets/js/jquery-1.11.3.min.js"></script>
      <![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script><script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.js"></script>
        <script type="text/javascript" src="<?=$path?>sweet-alert/sweet-alert.min.js"></script>
        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
             $(document).on('click', '.toolbar a[data-target]', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                $('.widget-box.visible').removeClass('visible');//hide others
                $(target).addClass('visible');//show target
             });
            });
            
            
            
            //you don't need this, just used for changing background
            jQuery(function($) {
             $('#btn-login-dark').on('click', function(e) {
                $('body').attr('class', 'login-layout');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'blue');
                
                e.preventDefault();
             });
             $('#btn-login-light').on('click', function(e) {
                $('body').attr('class', 'login-layout light-login');
                $('#id-text2').attr('class', 'grey');
                $('#id-company-text').attr('class', 'blue');
                
                e.preventDefault();
             });
             $('#btn-login-blur').on('click', function(e) {
                $('body').attr('class', 'login-layout blur-login');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'light-blue');
                
                e.preventDefault();
             });
             
            });
            $(document).ready(function(){
                    $('.sendpass').click(function(){
                        var email = $('#emailreset').val();
                        var sendemail = $('#sendemail').val();
                        var code = $('#code').val();
                        var pass = $('#passworduser').val();
                        console.log(pass);
                        var id = $('#userid').val();
                        var url = "";
                        if (sendemail == "changePass"){
                          url = "{{route('api.users.changePass')}}";
                        }else if (sendemail == "confirmcode" ){
                             url = "{{route('api.users.comfirmCode')}}";
                        }else{
                           url = "{{route('api.profile.email')}}";
                        }
                        $.ajax({
                          url: url,
                          type: "POST",
                          data: {email : email, id: id, password :pass, code:code},
                          success: function(data){
                              var dic = JSON.parse(data);
                              $('#userid').val(dic.data.id);
                              if (dic.code == 0){
                               console.log('you can not reset password');
                              }else{
                                  swal("Successed!", "Thanks!", "success");
                                  if(sendemail == "confirmcode"){
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
                                  }else if (sendemail == "changePass"){
                                      swal({    title: "Successed",
                                          text: "This password has been updated.",
                                          type: "success",
                                          showCancelButton: false,
                                          confirmButtonColor: "#8cd4f5",
                                          confirmButtonText: "OK",
                                          closeOnConfirm: true },
                                          function(){
                                              window.location.href = '{{ route("admin.login") }}';

                                          }
                                      );
                                  }else{ 
                                    $('#formemail').hide();
                                    createComfirmCodeForm();
                                  }
                              }
                            }
                        });
                    });
                    $("#formValidate").validate({
                        rules: {
                            username: {
                                required: true,
                                minlength: 4
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
                                equalTo: "#password_re"
                            }
                        },
                        //For custom messages
                        messages: {
                            username:{
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

            function createComfirmCodeForm(){
                $('#sendemail').val('confirmcode');
                var formconfirmcode =
                        '<div class="block clearfix" id="codeconfirmform">'+
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
                          '<input id="passworduser" type="password" data-error=".errorTxt3" name="password" placeholder="password" class="form-control">'+
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
    </body>
</html>
