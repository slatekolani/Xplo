<style>
    .navbar {
        background-color: dodgerblue;
        padding: 0.5rem 1rem;
        position: fixed; /* Ensure the navbar is fixed */
        width: 100%; /* Full width */
        z-index: 1000; /* Ensure it stays above other content */
    }

    .navbar.hidden {
        transform: translateY(-100%);
    }

    .navbar-brand {
        display: flex;
        align-items: center;
    }

    .companyLogo {
        width: 80px;
        height: 70px;
        transition: transform 0.3s ease;
    }

    .companyLogo:hover {
        transform: scale(1.1);
    }

    .navbar-nav .nav-link {
        color: white !important;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #ffd700 !important;
    }
    .navbar-nav .nav-link2 {
        color: black !important;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link2:hover {
        color: dodgerblue !important;
    }

    .dropdown-menu {
        background-color: #1e90ff;
        border: none;
    }

    .dropdown-item {
        color: white;
    }

    .dropdown-item:hover {
        background-color: #4169e1;
    }

    .search-form {
        display: flex;
    }

    .search-form .form-control {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .search-form .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 0, 0, 0.85)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

    @media (max-width: 991px) {
        .navbar-collapse {
            background-color: #1e90fff2;
            padding: 1rem;
            border-radius: 0.5rem;
        }
        .navbar-nav .nav-link {
            color: white !important;
        }
        .search-form {
            margin-top: 1rem;
        }
    }

    .header {
        display: flex;
        align-items: center;
        background-color: white;
        padding: 0.5rem 1rem;
        position: fixed; 
        width: 100%;
        z-index: 1000;
    }

    .userbox {
        margin-left: auto; 
        padding: 15px;
    }

    .profile-info {
        color: black; 
    }
    .navbar-toggler {
    border-color: rgba(255, 255, 255, 0.1);
}



@media (max-width: 991px) {
    .navbar-collapse {
        background-color: rgba(30, 144, 255, 0.95);
        padding: 1rem;
        border-radius: 0.5rem;
    }
    .navbar-nav .nav-link {
        color: white !important;
    }
}

</style>

@guest
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('/public/HomeImages/Xplo Safari Book white-01.png') }}" alt="{{ config('app.name') }}" class="companyLogo"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="localSafariDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Local Safari's & Tours
                    </a>
                    <div class="dropdown-menu" aria-labelledby="localSafariDropdown">
                        <a class="dropdown-item" href="{{route('localTourPackage.allLocalTourPackages')}}">All Local Trips</a>
                        <a class="dropdown-item" href="#">Day Trips</a>
                        <a class="dropdown-item" href="#">Weekend Getaways</a>
                        <a class="dropdown-item" href="#">Week-long Adventures</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tourOperator.allTourOperators') }}">Tour Operators</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Travel Education</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Others
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('touristicGame.allTouristicGames') }}">Touristic games</a>
                        <a class="dropdown-item" href="{{ route('platformFaq.publicView') }}">FAQ</a>
                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" style="color: #ffd700">Bon Voyage...</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" type="get" action="{{ route('localTourPackage.search') }}">
                <input class="form-control mr-sm-2" type="search" id="form1" name="search" placeholder="Travel destination?" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endguest

@auth
<header class="header navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ url('/public/HomeImages/Xplo Safari Book Logo.png') }}" alt="{{ config('app.name') }}" class="companyLogo"/>
    </a>
    
    <!-- Navbar Toggler for Small Screens -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAuthContent" aria-controls="navbarAuthContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarAuthContent">
        <ul class="navbar-nav ml-auto">
            <!-- Profile Info and Logout inside the navbar for mobile -->
            <li class="nav-item dropdown">
                <a class="nav-link2 dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i> {{ access()->user()->username }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.profile', access()->user()) }}">
                            <i class="fas fa-user"></i> @lang('label.my_profile')
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i> @lang('label.logout')
                        </a>
                    </li>
                    <!-- Logout Form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</header>
@endauth

@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endpush
