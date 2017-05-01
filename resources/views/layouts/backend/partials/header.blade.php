<?php $path = Config::get('constants.assets.backendTemplate'); ?>
  <button type="button" class="navbar-toggle pull-left">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    
    <!-- Search -->
    <form role="search" class="navbar-left app-search pull-left hidden-xs">
      <input type="text" placeholder="Search..." class="form-control">
    </form>
    
    <!-- Left navbar -->
    <nav class=" navbar-default hidden-xs" role="navigation">
        <ul class="nav navbar-nav">
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">English <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="#">German</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">Italian</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </li>
            <li><a href="#">Files</a></li>
            <li><a href="../frontend/" target="_blank">Frontend</a></li>
        </ul>
    </nav>
    
    <!-- Right navbar -->
    <ul class="list-inline navbar-right top-menu top-right-menu">  
        <!-- mesages -->  
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o "></i>
                <span class="badge badge-sm up bg-purple count">4</span>
            </a>
            <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5001">
                <li>
                    <p>Messages</p>
                </li>
                <li>
                    <a href="#">
                        <span class="pull-left">
                        
                        <img src="<?=$path?>img/avatar-2.jpg" class="img-circle thumb-sm m-r-15" alt="img">
                        </span>
                        <span class="block"><strong>John smith</strong></span>
                        <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 seconds ago</small></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="pull-left"><img src="<?=$path?>img/avatar-3.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                        <span class="block"><strong>John smith</strong></span>
                        <span class="media-body block">New tasks needs to be done<br><small class="text-muted">3 minutes ago</small></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="pull-left"><img src="<?=$path?>img/avatar-4.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                        <span class="block"><strong>John smith</strong></span>
                        <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 minutes ago</small></span>
                    </a>
                </li>
                <li>
                    <p><a href="inbox.html" class="text-right">See all Messages</a></p>
                </li>
            </ul>
        </li>
        <!-- /messages -->
        <!-- Notification -->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-sm up bg-pink count">3</span>
            </a>
            <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5002">
                <li class="noti-header">
                    <p>Notifications</p>
                </li>
                <li>
                    <a href="#">
                        <span class="pull-left"><i class="fa fa-user-plus fa-2x text-info"></i></span>
                        <span>New user registered<br><small class="text-muted">5 minutes ago</small></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="pull-left"><i class="fa fa-diamond fa-2x text-primary"></i></span>
                        <span>Use animate.css<br><small class="text-muted">5 minutes ago</small></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="pull-left"><i class="fa fa-bell-o fa-2x text-danger"></i></span>
                        <span>Send project demo files to client<br><small class="text-muted">1 hour ago</small></span>
                    </a>
                </li>
                
                <li>
                    <p><a href="#" class="text-right">See all notifications</a></p>
                </li>
            </ul>
        </li>
        <!-- /Notification -->

        <!-- user login dropdown start-->
        <li class="dropdown text-center">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="" class="img-circle profile-img thumb-sm" id="imgpro">
                <span class="username" id="username"></span> <span class="caret"></span>
                <input type="text" id="datauser" value="{{ Auth::user()->id }}" hidden="true"/>
            </a>
            <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                <li><a href="{{ route('admin.profile') }}"><i class="fa fa-briefcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{ route('admin.lock') }}"><i class="fa fa-unlock-alt"></i> lock</a></li>
                <li><a href="#"><i class="fa fa-bell"></i> Friends <span class="label label-info pull-right mail-info">5</span></a></li>
                <li><a href="{{route('admin.logout')}}"><i class="fa fa-sign-out"></i> Log Out</a></li>
               
            </ul>
        </li>
        <!-- user login dropdown end -->       
    </ul>
    <!-- End right navbar -->
    <script>
    $(document).ready(function(){
      $(window).load(function() {
          var id = $("#datauser").val();
          $.ajax({
            type: "POST",
            url: "{{ route('api.users.getprofileuser') }}",
            data: {
                'id':id
            },
            async: false,
            success: function(data) {
            var dic = JSON.parse(data);
            if(dic.code == 0){
             alert("user don't have profile")
            }
            else{
              if(dic.data.avatar !=""){
                  $('#imgpro').attr('src','http://'+document.domain+'/'+dic.data.avatar);
                  $('#username').text(dic.data.username);
              }else{
                $('#imgpro').attr('src',"<?=$path?>img/avatar-2.jpg");
                $('#username').text(dic.data.username);
              }
            }
          }
        });
      });
    });
</script>
