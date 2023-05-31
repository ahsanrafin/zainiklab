@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="text-center">{{ __('Welcome to Customer Dashboard') }}</h3>

                    <p class="text-center">You can share this profile link to the social media.</p>
                    <a class="btn btn-danger btn-lg w-100" href="{{ route('public.profile', auth()->user()->id) }}">Public Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
