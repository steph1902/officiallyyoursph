@extends('layouts.app')
@section('content')

<style>
    .form-group {
  margin-bottom: 1rem;
}

.form-control {
  border-radius: 0.25rem;
  border: 1px solid #ced4da;
  padding: 0.5rem 1rem;
  font-size: 1rem;
  line-height: 1.5;
  width: 100%;
}

.form-control:focus {
  border-color: #80bdff;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.form-text {
  display: block;
  margin-top: 0.25rem;
  font-size: 50%;
  color: #6c757d;
}

.form-check-input {
  margin-top: 0;
  margin-right: 1rem;
}

.btn-primary {
  background-color: #000;
  border-color: #fff;
  width: 100%;
}

.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}

.btn-primary:focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5) !important;
}

.btn-primary:not(:disabled):not(.disabled):active,
.btn-primary:not(:disabled):not(.disabled).active,
.show > .btn-primary.dropdown-toggle {
  background-color: #0062cc !important;
  border-color: #005cbf !important;
}

.btn-primary:not(:disabled):not(.disabled):active:focus,
.btn-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
}

.form-container {
  max-width: 600px;
  margin: 0 auto;
  padding: 2rem;
  background-color: #fff;
  border-radius: 0.25rem;
  box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
}

.form-header {
  text-align: center;
  margin-bottom: 2rem;
}

.form-header h1 {
  font-size: 1rem;
  margin-bottom: 0.5rem;
}

.form-header p {
  font-size: 0.8rem;
  color: #6c757d;
}

.form-body {
  margin-top: 2rem;
}

.form-body .form-group {
  margin-bottom: 1.5rem;
}

.form-body .form-control {
  height: 4rem;
}

.form-body .form-control:focus {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
}

.form-body .form-text {
  margin-top: 0.5rem;
  font-size: 0.9rem;
  color: #6c757d;
}

.form-body .form-check {
  margin-bottom: 1.5rem;
}

.form-body .btn-primary {
  height: 4rem;
  font-size: 1rem;
  border-radius: 0.25rem;
  transition: background-color 0.2s ease-in-out;
}

.form-body .btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}

.form-body .btn-primary:focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5) !important;
}

.form-body .btn-primary:not(:disabled):not(.disabled):active,
.form-body .btn-primary:not(:disabled):not(.disabled).active,
.form-body .show > .btn-primary.dropdown-toggle {
  background-color: #0062cc !important;
  border-color: #005cbf !important;
}

.form-body .btn-primary:not(:disabled):not(.disabled):active:focus,
.form-body .btn-primary:not(:disabled):not(.disabled).active:focus,
.form-body .show > .btn-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
}

.col-form-label
{
    font-size: 0.8rem;
}


</style>

<div style="padding-top:10%;"></div>

{{--  --}}

{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<div class="form-container">
    <div class="form-header">
        <h1>Register</h1>
        <p>
            Registering for this site allows you to access your order status and history. Just fill in the fields below, and we'll get a new account set up for you in no time. We will only ask you for information necessary to make the purchase process faster and easier.

        </p>
        {{-- <p>Create your account to start shopping</p> --}}
    </div>

    <div class="form-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row mb-3">
                <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-12">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-12">
                    <input id="password-confirm" type="password"class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- @endsection --}}

{{--  --}}

<div style="padding-top:10%;"></div>


@endsection
