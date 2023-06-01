@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->has('blocked'))
                <div class="alert bg-danger text-white alert-dismissible show" style="font-size: 0.875em"><strong>{{ $errors->first('blocked') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if($errors->has('message45Min'))
                <div class="alert bg-danger text-white alert-dismissible show" style="font-size: 0.875em"><strong>{{ $errors->first('message45Min') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" id="registerForm">
                        @csrf

                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="onClick(event)">
                                    {{ __('Login') }}
                                </button>

                                @if($errors->has('g-recaptcha-response'))
                                    <div class="text-danger" style="font-size: 0.875em"><strong>{{ $errors->first('g-recaptcha-response') }}</strong></div>
                                @endif

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    @push('scripts')
                    <script>
                        function onClick(e) {
                            e.preventDefault();
                                grecaptcha.ready(function() {
                                    grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'register'}).then(function(token) {
                                    document.getElementById("g-recaptcha-response").value = token;
                                    document.getElementById("registerForm").submit();
                                });
                            });
                        }
                    </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


