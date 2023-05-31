@extends('layouts.app')

@section('meta')
    <meta property="og:title" content="{{ $profile->name }}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:image" content="{{ URL::to($profile->avatar) }}" />
    <meta property="og:description" content="{{ $profile->about_me }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center no-gutters">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <div class="col-md-4 col-lg-4">
                        <img style="float: left" src="{{ asset('avatar/'.$profile->avatar) }}" class="img-fluid" alt="{{ $profile->name }}"></div>
                    <div class="col-md-8 col-lg-8" style="float: right">
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
                                <h3 class="display-5">{{ $profile->name }}</h3></div>
                            <div class="p-3 bg-black text-white">
                                <h6><strong>Bio: </strong> {{ $profile->about_me }}</h6>
                                <hr>
                                <p><strong>Email: </strong>{{ $profile->email }}</p>
                            </div>
                            <div class="d-flex flex-row text-white">
                                <div class="p-4 facebook text-center skill-block">
                                    <h4><i class="fa fa-facebook"></i></h4>
                                </div>
                                <div class="p-3 twitter text-center skill-block">
                                    <h4><i class="fa fa-twitter"></i></h4>
                                </div>
                                <div class="p-3 linkedin text-center skill-block">
                                    <h4><i class="fa fa-linkedin"></i></h4>
                                </div>
                                <div class="p-3 github  text-center skill-block">
                                    <h4><i class="fa fa-github"></i></h4>
                                </div>
                            </div>

                            <h4 class="text-center mt-5">Share this profile on Social Media.</h4>
                            <!-- ShareThis BEGIN -->
                            <div class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}"></div>
                            <!-- ShareThis END -->
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
