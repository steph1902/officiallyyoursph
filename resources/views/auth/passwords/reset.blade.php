@extends('layouts.app')
@section('content')


<style>
    .btn-primary {
  background-color: #000;
  border-color: #fff;
  width: 100%;
}


.password-reset-form {
  max-width: 500px;
  margin: 0 auto;
  padding: 2rem;
  background-color: #fff;
  border-radius: 0.25rem;
  box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
}

.password-reset-form .card-header {
  background-color: #000;
  border-color: #000;
  color: #fff;
  border-bottom: none;
  border-radius: 0.25rem 0.25rem 0 0;
  padding: 1rem;
  font-size: 1.5rem;
  font-weight: bold;
}

.password-reset-form .card-body {
  padding: 2rem;
}

.password-reset-form .form-control {
  height: 4rem;
  border-radius: 0.25rem;
  border: 1px solid #ced4da;
  padding: 0.5rem 1rem;
  font-size: 1rem;
  line-height: 1.5;
  width: 100%;
}

.password-reset-form .form-control:focus {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
}

.password-reset-form .form-text {
  display: block;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #6c757d;
}

.password-reset-form .form-check-input {
  margin-top: 0;
  margin-right: 1rem;
}

.password-reset-form .btn-primary {
  background-color: #000;
  border-color: #fff;
  height: 4rem;
  font-size: 1.5rem;
  border-radius: 0.25rem;
  transition: background-color 0.2s ease-in-out;
}

.password-reset-form .btn-primary:hover {
  background-color: #1d1d1d;
  border-color: #fff;
}

.password-reset-form .btn-primary:focus {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
}

.password-reset-form .btn-primary:not(:disabled):not(.disabled):active,
.password-reset-form .btn-primary:not(:disabled):not(.disabled).active,
.password-reset-form .show > .btn-primary.dropdown-toggle {
  background-color: #1d1d1d !important;
  border-color: #fff !important;
}

.password-reset-form .btn-primary:not(:disabled):not(.disabled):active:focus,
.password-reset-form .btn-primary:not(:disabled):not(.disabled).active:focus,
.password-reset-form .show > .btn-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
</style>


<div style="padding-top:10%;"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="padding-top:10%;"></div>


@endsection
