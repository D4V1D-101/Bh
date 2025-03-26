<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Brickhub</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/front/images/brickhubLogo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preload" href="{{asset('/front/plugins/slick/slick.css')}}" as="style">
    <link rel="preload" href="{{asset('/front/plugins/font-awesome/fontawesome.min.css')}}" as="style">
    <link rel="preload" href="{{asset('/front/plugins/font-awesome/brands.css')}}" as="style">
    <link rel="preload" href="{{asset('/front/plugins/font-awesome/solid.css')}}" as="style">
    <link rel="preload" href="{{asset('/front/css/style.css')}}" as="style">
    <link rel="stylesheet" href="{{asset('/front/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/front/plugins/font-awesome/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/plugins/font-awesome/brands.css')}}">
    <link rel="stylesheet" href="{{asset('/front/plugins/font-awesome/solid.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}">
    @livewireStyles
</head>

<body>

<header class="navigation bg-tertiary">
    <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
        <div class="container">
            <a class="navbar-brand" wire:navigate href="{{route('home')}}">
                <img loading="prelaod" decoding="async" class="img-fluid" width="160" src="{{asset('/front/images/brickhubLogo.png')}}" alt="Brickhub">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a wire:navigate class="nav-link" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item "> <a wire:navigate class="nav-link" href="{{route('page',2)}}">About Us</a></li>
                    <li class="nav-item "> <a wire:navigate class="nav-link" href="{{route('servicesPage')}}">Games</a></li>
                    <li class="nav-item "> <a wire:navigate class="nav-link" href="{{ route('teamPage') }}">Our Team</a></li>
                    <li class="nav-item "><a wire:navigate class="nav-link " href="{{ route('blog') }}">News</a></li>
                    <li class="nav-item "><a wire:navigate class="nav-link " href="{{ route('faqs') }}">FAQ</a></li>
                </ul>
                <div class="profile">
                    <div class="nav-item ">
                        @if(Auth::check())
                            {{ Auth::user()->name }}
                        @else
                        @endif
                    </div>
                    @if (Auth::check())
                        <form method="GET" action="{{ route('user.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary authbutton">Logout</button>
                            @if (Auth::user()->isAdmin())
                                <a href="{{ route('filament.admin.auth.login') }}" class="btn btn-outline-primary authbutton">Admin</a>
                            @endif
                        </form>
                    @else
                        <a href="{{ route('filament.admin.auth.register') }}" class="btn btn-outline-primary authbutton">Register</a>
                        <a href="{{ route('filament.admin.auth.login') }}" class="btn btn-outline-primary authbutton">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>

{{ $slot }}

<footer class="section-sm bg-tertiary">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="footer-widget">
                    <h5 class="mb-4 text-primary font-secondary">Service</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="service-details.html">Digital Marketing</a></li>
                        <li class="mb-2"><a href="service-details.html">Web Design</a></li>
                        <li class="mb-2"><a href="service-details.html">Logo Design</a></li>
                        <li class="mb-2"><a href="service-details.html">Design</a></li>
                        <li class="mb-2"><a href="service-details.html">SEO</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="footer-widget">
                    <h5 class="mb-4 text-primary font-secondary">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{route('page',1)}}" wire:navigate>About Us</a></li>
                        <li class="mb-2"><a href="#!">Contact Us</a></li>
                        <li class="mb-2"><a href="#!">Blog</a></li>
                        <li class="mb-2"><a href="#!">Team</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="footer-widget">
                    <h5 class="mb-4 text-primary font-secondary">Other Links</h5>
                    <ul class="list-unstyled">
                        <li class="list-inline-item me-4"><a class="text-black" href="{{route('page',2)}}" wire:navigate>Privacy Policy</a></li>
                        <li class="list-inline-item me-4"><a class="text-black" href="{{route('page',1)}}" wire:navigate>Terms &amp; Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('/front/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/front/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('/front/js/script.js')}}"></script>

@livewireScripts
</body>
</html>
