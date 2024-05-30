@extends('layouts.app')
@section('content')

<style>
    .form-container {
  max-width: 500px;
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

.btn-primary {
  background-color: #000;
  border-color: #fff;
  width: 100%;
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

.form-body .btn-primary:focus {
  box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5) !important;
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

.forgot-password-link {
  display: block;
  text-align: center;
  margin-top: 1.5rem;
  font-size: 0.9rem;
  color: #007bff;
  text-decoration: none;
  transition: color 0.2s ease-in-out;
}

.forgot-password-link:hover {
  color: #0056b3;
  text-decoration: underline;

}

</style>

<div style="padding-top:10%;"></div>

<div class="form-container">
    <div class="form-header">
        <h1>Login</h1>
        <p>Welcome back! Please enter your details to login.</p>
    </div>

    <div class="form-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row mb-3">
                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" required autocomplete="email" autofocus>

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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- <div class="form-group row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div> --}}

            <div class="row mb-0">
                <div class="col-md-12 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    




                </div>
            </div></form>
    </div>
</div>


<div style="padding-top:10%;"></div>

@endsection