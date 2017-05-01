            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?=$path?>images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content" >
                                    <li id="prfile_user" ><a href="{{ route('admin.profile') }}" ><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="{{ route('admin.lock') }}"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li>
                                    <li><a href="{{route('admin.logout')}}"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                    
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><i class="mdi-navigation-arrow-drop-down right"></i></a>

                            </div>
                        </div>
                     </li>
                     @foreach ($datauser as $element)
                         <li class="bold"><a href="{{route('admin.foods')}}" class="waves-effect waves-cyan"><i class="mdi-maps-local-restaurant"></i>{{$element['title']}}</a>
                        </li>
                     @endforeach
                   
                </ul>
                
            </aside>
            <!-- END LEFT SIDEBAR NAV-->
