<!--

=========================================================
* Swipe - Mobile App One Page Bootstrap 5 Template
=========================================================

* Product Page: https://themesberg.com/product/bootstrap/swipe-free-mobile-app-one-page-bootstrap-5-template
* Copyright 2020 Themesberg (https://www.themesberg.com)

* Coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Contact us if you want to remove it.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>{{Fungsi::app_nama()}}</title>


@stack('before-style')
@include('includes.landingstyle')
@stack('after-style')
<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>
    <header class="header-global" id="home">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-theme-secondary">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-4" href="{{ url('/') }}">
                <img class="navbar-brand-dark" src="{{ asset('/') }}assets/template/swipe/assets/img/light.svg" alt="Logo light">
                <img class="navbar-brand-light" src="{{ asset('/') }}assets/template/swipe/assets/img/dark.svg" alt="Logo dark">
            </a>
            <div class="navbar-collapse collapse mr-auto" id="navbar_global">

            {{-- sidebar --}}
            @include('includes.landingtopbar')

            </div>
            <div class="d-flex align-items-center">
                <a href="{{route('login')}}" class="btn btn-outline-soft d-none d-md-inline mr-md-3 animate-up-2">Login</a>
                <a href="{{route('register')}}"  class="btn btn-md btn-tertiary text-white d-none d-md-inline animate-up-2">Register<i class="fas fa-rocket ml-2"></i></a>
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>
    <main>
        @yield('content')
    </main>

    <footer class="footer py-5 pt-lg-6">
    <div class="sticky-left d-flex align-items-center bg-white p-3 pt-4 px-4 border border-soft shadow-sm rounded">
        <span class="mr-3 d-block font-small mb-1">Open source ❤️</span>
        <!-- Place this tag where you want the button to render. -->
        <a class="github-button" href="https://github.com/themesberg/swipe-one-page-bootstrap-5-template" data-color-scheme="no-preference: light; light: light; dark: dark;" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themesberg/swipe-one-page-bootstrap-5-template on GitHub">Star</a>
    </div>
    <div class="sticky-right">
        <a href="#home" class="icon icon-primary icon-md btn btn-icon-only btn-white border border-soft shadow-soft animate-up-3">
            <span class="fas fa-chevron-up"></span>
        </a>
    </div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <p>Swipe is a beautiful and free one page Bootstrap 5 Template created to showcase your awesome mobile app.</p>
                <ul class="social-buttons mb-5 mb-lg-0">
                    <li>
                        <a href="https://twitter.com/themesberg" aria-label="twitter social link" class="icon icon-md icon-twitter mr-3">
                            <span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/themesberg/" class="icon icon-md icon-facebook mr-3" aria-label="facebook social link">
                            <span class="fab fa-facebook"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/themesberg" aria-label="github social link" class="icon icon-md icon-github mr-3">
                            <span class="fab fa-github"></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://dribbble.com/themesberg" class="icon icon-md icon-dribbble" aria-label="dribbble social link" >
                            <span class="fab fa-dribbble"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-5 mb-lg-0">
                <span class="h5">Themesberg</span>
                <ul class="footer-links mt-2">
                    <li><a target="_blank" href="https://themesberg.com/blog">Blog</a></li>
                    <li><a target="_blank" href="https://themesberg.com/products">Products</a></li>
                    <li><a target="_blank" href="https://themesberg.com/about">About Us</a></li>
                    <li><a target="_blank" href="https://themesberg.com/contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 mb-5 mb-lg-0">
                {{-- <span class="h5 mb-3 d-block">Subscribe</span>
                <form action="#">
                    <div class="form-row mb-2">
                        <div class="col-12">
                            <input type="email" class="form-control mb-2" placeholder="example@company.com" name="email" aria-label="Subscribe form" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark shadow-soft btn-block" data-loading-text="Sending">
                                <span>Subscribe</span>
                            </button>
                        </div>
                    </div>
                </form>
                <p class="text-muted font-small m-0">No spam. Pinky swear.</p> --}}
            </div>
        </div>
        <hr class="bg-light my-2">
        <div class="row pt-2 pt-lg-5">
            <div class="col mb-md-0">
                <a href="#" target="_blank" class="d-flex justify-content-center">
                    <img src="{{ asset('/') }}assets/template/swipe/assets/img/themesberg.svg" height="25" class="mb-3" alt="Themesberg Logo">
                </a>
            <div class="d-flex text-center justify-content-center align-items-center" role="contentinfo">
                <p class="font-weight-normal font-small mb-0">Copyright © BaemonTeam 2022-<span class="current-year">2020</span>. All rights reserved. Template By themesberg</p>
                </div>
            </div>
        </div>
    </div>
</footer>


{{-- script --}}
@stack('before-script')
@include('includes.landingscript')
@stack('after-script')

</body>

</html>
