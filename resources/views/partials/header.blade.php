
<div id="header">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="left hide-on-med-and-down">
                    <li class="active"><a href="{{ route('pages.index') }}">Homepage</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
                <ul class="right">
                    <li><a href="{{route('users.login')}}"><i class="fa fa-user"> Login</i></a></li>
                    <li><a href="#"><i class="fa fa-sign-in"> Sign in</i></a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Homepage</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
            </div>
        </nav>
    </div>

</div>