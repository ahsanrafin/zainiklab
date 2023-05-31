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

                    <h3 class="text-center">{{ __('Welcome to ADMIN Dashboard') }}</h3>

                    <p class="text-center">You can manage your customers according your choices.</p>
                    @if (auth()->user()->role_id == 1)
                        <a href="{{ route('get.customers') }}" class="btn-lg w-100 btn btn-danger">Manage Customers</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
