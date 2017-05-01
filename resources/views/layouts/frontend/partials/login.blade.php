<?php $path = Config::get('constants.assets.backendTemplate'); ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?=$path;?>css/bootstrap.min.css" />

    <style>
        body{
    background-image:url(bg.png);
    font-family: 'Oleo Script', cursive;
}

.lg-container{
    width:396px;
    margin:100px auto;
    padding:20px 40px;
    border:1px solid #f4f4f4;
    background:rgba(255,255,255,.5);
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    
    -webkit-box-shadow: 0 0 2px #aaa;
    -moz-box-shadow: 0 0 2px #aaa;
    box-shadow: 0 0 2px #aaa;
}
.lg-container h1{
    font-size:40px;
    text-align:center;
}
#lg-form > div {
    margin:10px 5px;
    padding:5px 0;
}
#lg-form label{
    display: none;
    font-size: 20px;
    line-height: 25px;
}
#changePassword{float: left;}
#lg-form input[type="text"],
#lg-form input[type="password"]{
    border:1px solid rgba(51,51,51,.5);
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    padding: 5px;
    font-size: 16px;
    line-height: 20px;
    width: 100%;
    font-family: 'Oleo Script', cursive;
    text-align:center;
}
#lg-form input[class="forms"]{
    border:1px solid rgba(51,51,51,.5);
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    padding: 5px;
    font-size: 16px;
    line-height: 20px;
    width: 100%;
    font-family: 'Oleo Script', cursive;
    text-align:center;
}
#lg-form div:nth-child(3) {
    text-align:center;
}
#lg-form button{
    font-family: 'Oleo Script', cursive;
    font-size: 18px;
    border:1px solid #000;
    padding:5px 10px;
    border:1px solid rgba(51,51,51,.5);
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    
    -webkit-box-shadow: 2px 1px 1px #aaa;
    -moz-box-shadow: 2px 1px 1px #aaa;
    box-shadow: 2px 1px 1px #aaa;
    cursor:pointer;
}
#lg-form button:active{
    -webkit-box-shadow: 0px 0px 1px #aaa;
    -moz-box-shadow: 0px 0px 1px #aaa;
    box-shadow: 0px 0px 1px #aaa;
}
#lg-form button:hover{
    background:#f4f4f4;
}
#message{width:100%;text-align:center}
.success {
    color: green;
}
.error {
    color: red;
}
.navbar-fixed-top  li {
    float: left;
    list-style-type: none;
    margin: 0px 2px 30px 20px;
    font-size: 20px;

}

</style>
   <script type="text/javascript" src="{{ASSETS_PATH}}js/jquery-1.12.0.min.js"></script>
    
</head>
<body>
    <div class="navbar-fixed-top align-right pull-right">
        <br />
        <li><a id="btn-login-dark" href="{{url('/')}}">Home &nbsp;/</a></li>
    @if(!isset($user))
        <li><a id="btn-login-dark" href="{{url('/user/register')}}">Register &nbsp; /</a></li>
    @else
        <li><a id="btn-login-blur" href="{{url('/user-info')}}">{{$user->username}} &nbsp;/</a></li>
        <li><a id="btn-login-light" href="{{url('/user/logout')}}">Logout</a></li>
    @endif
              
    </div>
    <div class="lg-container">
        <h1>Login</h1>
        @if (Session::get("flash_level"))
            <div class="alert alert-danger">
                {!! Session::has('flash_level') ? Session::get("flash_level") : '' !!}
             </div>
        @endif
        <form action="{{url('/user/login')}}" id="lg-form" name="lg-form" method="post">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div>
                <label for="email">Email:</label>
                <input class="forms" type="email" name="email" placeholder="email"   />
                {!! $errors->first('email', '<div class="help-block col-xs-12 col-sm-reset inline error" style="color:#ff5a92;">:message</div>') !!}
            </div>
            <div>
                <label for="username">Password:</label>
                <input type="password" id="password" name="password" placeholder="password" />
                {!! $errors->first('password', '<div class="help-block col-xs-12 col-sm-reset inline error" style="color:#ff5a92;">:message</div>') !!}
            </div>
    
            <div>               
                <button type="submit" id="login">Login</button>
            </div>
            
        </form>
        <div id="message"></div>
    </div>

</body>
</html>