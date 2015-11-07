
<div id="header">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="{{route('pages.index')}}" class="brand-logo">Quiz App</a>

                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                
                <ul class="right hide-on-med-and-down">
                    <?php
                            if (Auth::check()) {
                                $user = Auth::user();
                                echo "<li><img width='60' height='60' src='/". $user->avatar."'  alt='' /> </li>". "<li><p>".$user->name ."</p> </li>";
                            }
                            else {
                                echo "<li><a href='" . route('auth.login') . "'> <i class='fa fa-user'> Login</i></a></li>";
                            }
                    ?>
                    <li>
                        <a href="{{route('auth.logout')}}"><i class="fa fa-sign-out"> Sign out</i></a>
                    </li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="{{route('pages.index')}}">Homepage</a></li>
                    <li><?php
                                if (Auth::check()) {
                                    $user = Auth::user();
                                    echo "<a href=" . route('user.show', $user->user_name) .">Profile</a>";
                                }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</div>