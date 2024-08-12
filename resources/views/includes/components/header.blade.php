
@guest
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" id="navbar">
        <div class="container">
            <a href="{{ url("/") }}">
                <img src="{{ url("/public/HomeImages/Logo_for_expedition___Exploration-removebg-preview.png") }}" alt="{{ config("app.name") }}" class="companyLogo"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('localTourPackage.allLocalTourPackages')}}">Local Safari's & Tours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tourOperator.allTourOperators')}}">Tour Operators</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Others
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
{{--                            <a class="dropdown-item" href="{{route('Tanzania.show',$nation->uuid)}}">Discover Tanzania</a>--}}
                            <a class="dropdown-item" href="{{route('touristicGame.allTouristicGames')}}">Touristic games</a>
                            <a class="dropdown-item" href="{{route('platformFaq.publicView')}}">Faq</a>
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style="color: dodgerblue">Bon Voyage...</a>
                        </div>
                    </li>
                </ul>
                <form type="get" action="{{route('localTourPackage.search')}}" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" id="form1" name="search" placeholder="Travel destination?" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div> <!-- Close the container -->
    </nav>
@endguest

    @auth
        <div class="header-right">
        <span class="d-xl-inline-block">
<!-- @include("includes/partials/lang") -->
        </span>
        <header class="header fixed has-top-menu">

            <div class="logo-container">

                <a href="{{ url("/") }}" class="logo">
                    <img src="{{ url("/public/HomeImages/Logo_for_expedition___Exploration-removebg-preview.png") }}" width="300" height="70" style="margin-left: 40px" alt="{{ config("app.name") }}"/>
                </a>
            </div>

        <span class="separator"></span>
        <div id="userbox" class="userbox pull-right" style="padding: 15px 15px 15px 15px">
            <a href="#" data-toggle="dropdown">
                <div class="profile-info" data-lock-name="{{ access()->user()->username }}" data-lock-email="{{ access()->user()->email }}">
                    <span class="name"></span>
                    @auth
                        <span class="name"> <span class="badge badge-pill badge-success">&nbsp;</span> {{  access()->user()->username }}</span>
                    @endauth
                </div>
                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route('user.profile', access()->user()) }}"><i
                                class="fas fa-user"></i> @lang('label.my_profile')</a>
                    </li>
                    <li>
                        {{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
                        {{ Form::close() }}
                        <a role="menuitem" tabindex="-1" href="{{ route("logout") }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fas fa-power-off"></i> @lang("label.logout") </a>
                    </li>
                </ul>
            </div>
        </div>
        </header>
</div>
    @endauth
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
@push('after-scripts')
    <script>
        var prevScrollPos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollPos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
                document.getElementById("bottomNavigation").style.bottom = "-100px";
                document.getElementById("bottomNavigation").style.transition = "1s";
            } else {
                document.getElementById("navbar").style.top = "-50px";
                document.getElementById("navbar").style.transition = "1s";
                document.getElementById("bottomNavigation").style.bottom = "0";
            }
            prevScrollPos = currentScrollPos;
        }
    </script>
@endpush
