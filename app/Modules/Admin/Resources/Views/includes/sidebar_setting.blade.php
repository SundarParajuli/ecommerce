<div class="navbar-header">
    <a class="navbar-brand" href="">ADMIN PANEL</a>

    <ul class="nav navbar-nav visible-xs-block">
        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>
</div>
<div class="navbar-collapse collapse" id="navbar-mobile">
    <ul class="nav navbar-nav">
        <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
        </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">


        <li class="dropdown dropdown-user">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <span class="icon-users2"></span>
                <span>{{auth()->guard('admins')->user()->userProfile->first_name}} {{ auth()->guard('admins')->user()->userProfile->last_name }}</span>
                <i class="caret"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                {{--<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>--}}

                @if (session('impersonated_by'))
                    <li>
                        <a href="{{ route('impersonate.leave') }}"><i class="icon-cross"></i> Exit Impersonation</a>
                    </li>
                @endif 
                <li class="divider"></li>
                <li>
                    <a href=" @if(auth()->guard('admins')->user()->user_type == 'vendor') {{ route('vendor.setting.change-password') }} @else {{route('setting.change-password')}} @endif">
                        <i class="icon-lock"></i>Change Password
                    </a>
                </li>
                <li><a href="{{route('logout')}}"><i class="icon-switch2"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</div>

