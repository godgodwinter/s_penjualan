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
                        <p class="lead mb-4 mb-lg-5">Termurah, Terpercaya dan Terlengkap. </p>
                        {{-- <p class="lead mb-4 mb-lg-5">Made with Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}).</p> --}}

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
                        <p class="lead mb-4 mb-lg-5"> Semua ada semua bisa.</p>
                        {{-- <p class="lead mb-4 mb-lg-5"> v0. {{ $versi }}.</p> --}}
                        <div>
                            <a href="https://baemon.web.id/" class="btn btn-dark btn-download-app">
                                <span class="d-flex align-items-center">
                                    <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-google-play"></span></span>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-normal d-none d-md-block"></small> Mulai Belanja
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
        
@endsection
