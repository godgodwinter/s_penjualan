@extends('layouts.landing')

@section('title')
Beranda
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@section('content')

        <!-- Hero -->
        <section class="section section-header text-dark pb-md-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center mb-5 mb-md-7">
                        <h1 class="display-2 font-weight-bolder mb-4">
                           {{Fungsi::app_nama()}}
                        </h1>
                        <p class="lead mb-4 mb-lg-5">Made with Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}).</p>

        @php
        // exec('git rev-parse --verify HEAD 2> /dev/null', $output);
        // $hash = $output[0];
        // dd($hash)
        $commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));
        $commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
        $commitDate->setTimezone(new \DateTimeZone('UTC'));
        // dd($commitDate);
        // dd($commitDate->format('Y-m-d H:i:s'));
        $versi=$commitDate->format('Ymd.H.i.s');
    @endphp
                        <p class="lead mb-4 mb-lg-5"> v0. {{ $versi }}.</p>
                        <div>
                            <a href="https://github.com/godgodwinter" class="btn btn-dark btn-download-app mb-xl-0 mr-2 mr-md-3">
                                <span class="d-flex align-items-center">
                                    <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-github"></span></span>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-normal d-none d-md-block"></small> Github
                                    </span>
                                </span>
                            </a>
                            <a href="https://baemon.web.id/" class="btn btn-dark btn-download-app">
                                <span class="d-flex align-items-center">
                                    <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-google-play"></span></span>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-normal d-none d-md-block"></small> BaemonTeam
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 justify-content-center">
                        <img class="d-none d-md-inline-block" src="{{ asset('/') }}assets/template/swipe/assets/img/illustrations/scene.svg" alt="Mobile App Mockup">
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg py-0">
            <div class="container">
            <div class="row ">

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card border-0 bg-white text-center p-1" >
                    <img src="{{asset('/')}}assets/img/unsplash-produk1.jpg" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 150px;object-fit: cover"> 
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Harga : Rp 200.000,00</p>
                      <a href="#" class="btn btn-info">Add</a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card border-0 bg-white text-center p-1" >
                    <img src="https://ui-avatars.com/api/?name=Produk&color=7F9CF5&background=EBF4FF" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 150px;object-fit: cover"> 
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Harga : Rp 200.000,00</p>
                      <a href="#" class="btn btn-info">Add</a>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card border-0 bg-white text-center p-1" >
                    <img src="{{asset('/')}}assets/img/unsplash-produk1.jpg" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 150px;object-fit: cover"> 
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Harga : Rp 200.000,00</p>
                      <a href="#" class="btn btn-info">Add</a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card border-0 bg-white text-center p-1" >
                    <img src="https://ui-avatars.com/api/?name=Produk&color=7F9CF5&background=EBF4FF" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 150px;object-fit: cover"> 
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Harga : Rp 200.000,00</p>
                      <a href="#" class="btn btn-info">Add</a>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card border-0 bg-white text-center p-1" >
                    <img src="{{asset('/')}}assets/img/unsplash-produk1.jpg" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 150px;object-fit: cover"> 
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Harga : Rp 200.000,00</p>
                      <a href="#" class="btn btn-info">Add</a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card border-0 bg-white text-center p-1" >
                    <img src="https://ui-avatars.com/api/?name=Produk&color=7F9CF5&background=EBF4FF" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 150px;object-fit: cover"> 
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Harga : Rp 200.000,00</p>
                      <a href="#" class="btn btn-info">Add</a>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card border-0 bg-white text-center p-1" >
                    <img src="{{asset('/')}}assets/img/unsplash-produk1.jpg" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 150px;object-fit: cover"> 
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Harga : Rp 200.000,00</p>
                      <a href="#" class="btn btn-info">Add</a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card border-0 bg-white text-center p-1" >
                    <img src="https://ui-avatars.com/api/?name=Produk&color=7F9CF5&background=EBF4FF" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 150px;object-fit: cover"> 
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Harga : Rp 200.000,00</p>
                      <a href="#" class="btn btn-info">Add</a>
                    </div>
                  </div>
                </div>
                
            </div>

            </div>
        </section>
        <section class="section section-lg py-0">
            <div class="container">
            
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-0 bg-white text-center p-1">
                            <div class="card-header bg-white border-0 pb-0">
                                <div class="icon icon-lg icon-primary mb-4">
                                    <span class="fas fa-money-bill-wave"></span>
                                </div>
                                <h2 class="h3 text-dark m-0">Pay better</h2>
                            </div>
                            <div class="card-body">
                                <p>
                                    Speed through checkout and offset delivery at the same time.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-0 bg-white text-center p-1">
                            <div class="card-header bg-white border-0 pb-0">
                                <div class="icon icon-lg icon-primary mb-4">
                                    <span class="fas fa-map-marked-alt"></span>
                                </div>
                                <h2 class="h3 text-dark m-0">Track better</h2>
                            </div>
                            <div class="card-body">
                                <p>
                                    Get real-time delivery updates from cart to home in one place.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 bg-white text-center p-1">
                            <div class="card-header bg-white border-0 pb-0">
                                <div class="icon icon-lg icon-primary mb-4">
                                    <span class="fas fa-shopping-basket"></span>
                                </div>
                                <h2 class="h3 text-dark m-0">Shop better</h2>
                            </div>
                            <div class="card-body">
                                <p>
                                    Upgrade with personal settings from your favorite stores.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg" id="about">
            <div class="container">
                <div class="row justify-content-center mb-5 mb-lg-7">
                    <div class="col-12 col-lg-8 text-center">
                        <h2 class="h1 mb-4">Better in every way</h2>
                        <p class="lead">Self-Service Analytics or ad hoc reporting gives users the ability to develop rapid reports, empowering users to analyze their data.</p>
                    </div>
                </div>
                <div class="row row-grid align-items-center mb-5 mb-lg-7">
                    <div class="col-12 col-lg-5">
                        <h2 class="mb-4">A thoughtful way to pay</h2>
                        <p>Simpler App remembers your important details, so you can fill carts, not forms. And everything is encrypted so you can speed safely through checkout.</p>
                        <p>Now, you can offset the carbon emissions produced by your deliveries—for free. All you have to do is check out with Shop Pay, one of the first carbon-neutral way to pay.</p>
                        <a href="#" class="btn btn-dark mt-3 animate-up-2">
                            Learn More
                            <span class="icon icon-xs ml-2">
                                <i class="fas fa-external-link-alt"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 ml-lg-auto">
                        <img src="{{ asset('/') }}assets/template/swipe/assets/img/illustrations/scene-3.svg" class="w-100" alt="">
                    </div>
                </div>
                <div class="row row-grid align-items-center mb-5 mb-lg-7">
                    <div class="col-12 col-lg-5 order-lg-2">
                        <h2 class="mb-4">Get it. Don't sweat it.</h2>
                        <p>We track your desktop and mobile keyword rankings from any location and plot your full ranking history on a handy graph.</p>
                        <p>You can set up automated ranking reports to be sent to your email address, so you’ll never forget to check your ranking progress.</p>
                        <a href="#" class="btn btn-dark mt-3 animate-up-2">
                            Learn More
                            <span class="icon icon-xs ml-2">
                                <i class="fas fa-external-link-alt"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 mr-lg-auto">
                        <img src="{{ asset('/') }}assets/template/swipe/assets/img/illustrations/scene-2.svg" class="w-100" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card border-light p-4">
                            <div class="card-body">
                                <h2 class="display-2 mb-2">98%</h2>
                                <span>Average satisfaction rating received in the past year.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card border-light p-4">
                            <div class="card-body">
                                <h2 class="display-2 mb-2">24/7</h2>
                                <span> Our support team is a quick chat or email away.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card border-light p-4">
                            <div class="card-body">
                                <h2 class="display-2 mb-2">220k+</h2>
                                <span>Extension installs from the two major mobile app stores.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="section section-sm py-0">
            <div class="container">
                <div class="row text-center mb-5">
                    <div class="col">
                        <h2 class="h6 font-weight-bold text-brown">We're proudly featured by</h2>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col d-flex justify-content-center flex-wrap">
                        <a href="#" aria-label="Stripe brand logo" class="icon icon-xl icon-dark mr-4 mr-sm-5"
                        data-toggle="tooltip" data-placement="top" title="Stripe">
                            <span class="fab fa-stripe"></span>
                        </a>
                        <a href="#" aria-label="Digg brand logo" class="icon icon-xl icon-dark mr-4 mr-sm-5"
                        data-toggle="tooltip" data-placement="top" title="Digg">
                            <span class="fab fa-digg"></span>
                        </a>
                        <a href="#" aria-label="FedEx brand logo" class="icon icon-xl icon-dark mr-4 mr-sm-5"
                        data-toggle="tooltip" data-placement="top" title="FedEx">
                            <span class="fab fa-fedex"></span>
                        </a>
                        <a href="#" aria-label="Ember brand logo" class="icon icon-xl icon-dark mr-4 mr-sm-5"
                        data-toggle="tooltip" data-placement="top" title="Ember">
                            <span class="fab fa-ember"></span>
                        </a>
                        <a href="#" aria-label="Beyond brand logo" class="icon icon-xl icon-dark mr-4 mr-sm-5"
                        data-toggle="tooltip" data-placement="top" title="Beyond">
                            <span class="fab fa-d-and-d-beyond"></span>
                        </a>
                        <a href="#" aria-label="AngryCreative brand logo" class="icon icon-xl icon-dark"
                        data-toggle="tooltip" data-placement="top" title="AngryCreative">
                            <span class="fab fa-angrycreative"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="section section-lg pb-0" id="testimonials">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center mb-5 mb-lg-6">
                        <h2 class="display-3 mb-4">Customers love it</h2>
                        <p class="lead">The final result of our formula at work. Check out what our clients <br class="d-none d-lg-inline-block"> have to say about our mobile app and our support team.</p>
                    </div>
                </div>
                <div class="row mt-lg-6">
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-light">
                            <div class="card-body text-center py-5">
                                <img class="image-sm img-fluid mx-auto mb-3" src="{{ asset('/') }}assets/template/swipe/assets/img/clients/airbnb.svg" alt="Airbnb brand">
                                <span class="d-block">
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star far fa-star text-warning"></span>
                                </span>
                                <p class="px-2 my-4">Swipe has replaced the whiteboard for us! Being able to jump in the same file with someone fills the gap of not being able to gather in person.</p>
                                <a href="#" class="btn btn-link text-black">
                                    <span class="mr-2"><span class="fas fa-book-open"></span></span>
                                    <span class="font-weight-bold">Read story</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-light mt-lg-n6">
                            <div class="card-body text-center py-5">
                                <img class="image-sm img-fluid mx-auto mb-3" src="{{ asset('/') }}assets/template/swipe/assets/img/clients/corsair.svg" alt="Corsair brand">
                                <span class="d-block">
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star far fa-star text-warning"></span>
                                </span>
                                <p class="px-2 my-4">Swipe has replaced the whiteboard for us! Being able to jump in the same file with someone fills the gap of not being able to gather in person.</p>
                                <a href="#" class="btn btn-link text-black">
                                    <span class="mr-2"><span class="fas fa-book-open"></span></span>
                                    <span class="font-weight-bold">Read story</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-light">
                            <div class="card-body text-center py-5">
                                <img class="image-sm img-fluid mx-auto mb-3" src="{{ asset('/') }}assets/template/swipe/assets/img/clients/paypal.svg" alt="Paypal brand">
                                <span class="d-block">
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star far fa-star text-warning"></span>
                                </span>
                                <p class="px-2 my-4">Swipe has replaced the whiteboard for us! Being able to jump in the same file with someone fills the gap of not being able to gather in person.</p>
                                <a href="#" class="btn btn-link text-black">
                                    <span class="mr-2"><span class="fas fa-book-open"></span></span>
                                    <span class="font-weight-bold">Read story</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-lg-4">
                        <div class="card border-light">
                            <div class="card-body text-center py-5">
                                <img class="image-sm img-fluid mx-auto mb-3" src="{{ asset('/') }}assets/template/swipe/assets/img/clients/ebay.svg" alt="Google brand">
                                <span class="d-block">
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star far fa-star text-warning"></span>
                                </span>
                                <p class="px-2 my-4">Swipe has replaced the whiteboard for us! Being able to jump in the same file with someone fills the gap of not being able to gather in person.</p>
                                <a href="#" class="btn btn-link text-black">
                                    <span class="mr-2"><span class="fas fa-book-open"></span></span>
                                    <span class="font-weight-bold">Read story</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-lg-n5">
                        <div class="card border-light">
                            <div class="card-body text-center py-5">
                                <img class="image-sm img-fluid mx-auto mb-3" src="{{ asset('/') }}assets/template/swipe/assets/img/clients/northwestern.svg" alt="northwestern brand">
                                <span class="d-block">
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star far fa-star text-warning"></span>
                                </span>
                                <p class="px-2 my-4">Swipe has replaced the whiteboard for us! Being able to jump in the same file with someone fills the gap of not being able to gather in person.</p>
                                <a href="#" class="btn btn-link text-black">
                                    <span class="mr-2"><span class="fas fa-book-open"></span></span>
                                    <span class="font-weight-bold">Read story</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-lg-4">
                        <div class="card border-light">
                            <div class="card-body text-center py-5">
                                <img class="image-sm img-fluid mx-auto mb-3" src="{{ asset('/') }}assets/template/swipe/assets/img/clients/elastic.svg" alt="Elastic brand">
                                <span class="d-block">
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star fas fa-star text-warning"></span>
                                    <span class="star far fa-star text-warning"></span>
                                </span>
                                <p class="px-2 my-4">Swipe has replaced the whiteboard for us! Being able to jump in the same file with someone fills the gap of not being able to gather in person.</p>
                                <a href="#" class="btn btn-link text-black">
                                    <span class="mr-2"><span class="fas fa-book-open"></span></span>
                                    <span class="font-weight-bold">Read story</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-lg" id="faq">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-12 text-center mb-4 mb-lg-5">
                        <h2 class="display-3 mb-4">Facts & Questions</h2>
                        <p class="lead">Have a question? Read through our FAQ below. If you can't find an answer, <br class="d-none d-lg-inline-block"> please email our support team. We're here to help.</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <!--Accordion-->
                        <div class="accordion" id="accordionExample">
                            <div class="card border-light mb-0">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block d-flex justify-content-between text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="h6 mb-0 font-weight-bold">What is the purpose of a FAQ?</span>
                                            <span class="icon"><span class="fas fa-plus"></span></span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="mb-0">
                                            At Themesberg, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also
                                            helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-light mb-0">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block d-flex justify-content-between text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="h6 mb-0 font-weight-bold">What is a FAQ document?</span>
                                            <span class="icon"><span class="fas fa-plus"></span></span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="mb-0">
                                            At Themesberg, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also
                                            helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-light mb-0">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block d-flex justify-content-between text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span class="h6 mb-0 font-weight-bold">What are the top 10 interview questions?</span>
                                            <span class="icon"><span class="fas fa-plus"></span></span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="mb-0">
                                            At Themesberg, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also
                                            helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-light mb-0">
                                <div class="card-header" id="headingFour">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block d-flex justify-content-between text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <span class="h6 mb-0 font-weight-bold">Cookies?</span>
                                            <span class="icon"><span class="fas fa-plus"></span></span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="mb-0">
                                            At Themesberg, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also
                                            helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-light mb-0">
                                <div class="card-header" id="headingFive">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block d-flex justify-content-between text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            <span class="h6 mb-0 font-weight-bold">Copyright Notice</span>
                                            <span class="icon"><span class="fas fa-plus"></span></span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="mb-0">
                                            At Themesberg, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also
                                            helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End of Accordion-->
                    </div>
                </div>
            </div>
        </section>
        <div class="section bg-soft" id="download">
            <figure class="position-absolute top-0 left-0 w-100 d-none d-md-block mt-n3">
                <svg class="fill-soft" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 43.4" style="enable-background:new 0 0 1920 43.4;" xml:space="preserve">
                   <path d="M0,23.3c0,0,405.1-43.5,697.6,0c316.5,1.5,108.9-2.6,480.4-14.1c0,0,139-12.2,458.7,14.3 c0,0,67.8,19.2,283.3-22.7v35.1H0V23.3z"></path>
                </svg>
            </figure>
            <div class="container">
                <div class="row row-grid align-items-center">
                    <div class="col-12 col-lg-6">
                        <span class="h5 text-muted mb-2 d-block">Download App</span>
                        <h2 class="display-3 mb-4">Get started in seconds</h2>
                        <p class="lead text-muted">Quickly connect to tools and services such as Google Analytics, Intercom or Github to track, measure and optimize performance. </p>
                        <div class="mt-4 mt-lg-5">
                            <a href="#" class="btn btn-dark btn-download-app mb-xl-0 mr-2 mr-md-3">
                                <span class="d-flex align-items-center">
                                    <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-apple"></span></span>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-normal d-none d-md-block">Available on</small> App Store
                                    </span>
                                </span>
                            </a>
                            <a href="#" class="btn btn-dark btn-download-app">
                                <span class="d-flex align-items-center">
                                    <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-google-play"></span></span>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-normal d-none d-md-block">Available on</small> Google Play
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 ml-lg-auto">
                        <img class="d-none d-lg-inline-block" src="{{ asset('/') }}assets/template/swipe/assets/img/illustrations/scene-3.svg" alt="Mobile App Illustration">
                    </div>
                </div>
            </div>
        </div>

@endsection
