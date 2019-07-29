<div class="navbar-fixed ">
    <nav class="nav-wrapper white" role="navigation">
        <div class=" container">
            <a id="logo-container" href="{{URL::to('/')}}" class="brand-logo black-text">Reporting</a>
            <ul class="right hide-on-med-and-down">
                <li class="center {{ Request::path() == 'login' ? 'active' : '' }}">
                    <a href="{{URL::to('login')}}">Login</a>
                </li>
                <li class="center {{ Request::path() == 'register' ? 'active' : '' }}">
                    <a href="{{URL::to('register')}}">Register</a>
                </li>
            </ul>
            <!--            mobile navigation menu-->

            <ul id="nav-mobile" class="side-nav white ">
                <li class="center {{ Request::path() == 'login' ? 'active' : '' }}">
                    <a href="{{URL::to('login')}}">Login</a>
                </li>
                <li class="center {{ Request::path() == 'register' ? 'active' : '' }}">
                    <a href="{{URL::to('register')}}">Register</a>
                </li>
            </ul>
            <!--            nav menu on mobile-->
            <a href="" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>