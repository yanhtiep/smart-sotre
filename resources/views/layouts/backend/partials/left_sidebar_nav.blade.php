 <!-- brand -->
            <div class="logo">
                <a href="index.html" class="logo-expanded">
                    <img src="<?=$path?>img/single-logo.png" alt="logo">
                    <span class="nav-label">Online store</span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="has-submenu active"><a href="#"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a>  
                    </li>

                    <li class="has-submenu {{ (Request::url() == route('admin.user')) ? 'active' : '' }}"><a href="{{route('admin.user')}}"><i class="fa fa-users"></i> <span class="nav-label">Users</span></a>  
                    </li>
                    <li class="has-submenu {{ (Request::url() == route('admin.category')) ? 'active' : '' }}">
                            <a href="{{route('admin.category')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                    </li>
                    <li class="has-submenu {{ (Request::url() == route('admin.attributes')) ? 'active' : '' }}">
                            <a href="{{route('admin.attributes')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Attribute<span class="fa arrow"></span></a>
                    </li>
                    <li class="has-submenu {{ (Request::url() == route('admin.stock')) ? 'active' : '' }}">
                            <a href="{{route('admin.stock')}}"><i class="fa fa-cube fa-fw"></i> Stocks<span class="fa arrow"></span></a>
                    </li>
                        
                     <?php
                        $set_active =  (Request::url() == route('admin.setup')  ) ? "active" :"";
                    ?>
                    <li class="has-submenu {{$set_active}}"><a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Setup</span></a>
                        <ul class="list-unstyled">
                            <li class="{{ (Request::url() == route('admin.setup')) ? 'active' : '' }}">
                                <a href="{{route('admin.setup')}}"><i class="fa fa-bars"></i> 
                                Setup lists</a></li>
                            <li><a href="#">
                                <i class="fa fa-bell-o"></i> Setup advertise</a></li>
                            <li>
                                <a href="#"><i class="fa fa-truck"></i>Shipping company</a>
                            </li>
                         
                        </ul>
                    </li>
                </ul>
            </nav>