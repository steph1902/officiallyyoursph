@extends('layouts.app')
@section('content')


<style>
    body {
    /* font-family: 'Open Sans', sans-serif; */
    margin: 0;
    padding: 0;
}

.container {
    margin-top: 50px;
}

.nav-link {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.nav-link:hover {
    background-color: #eee;
}

.nav-link.active {
    font-weight: bold;
}

h1 {
    font-size: 2rem;
    margin-bottom: 20px;
}

p {
    font-size: 1.2rem;
}
</style>

<div style="padding-top:10%;"></div>




{{--  --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head> --}}
{{-- <body> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('my-account/order-summary')}}">Orders</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Downloads</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ 'my-account/address' }}">Addresses</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Account details</a>
                    </li> --}}
                    <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                {{-- <h1>Dashboard</h1> --}}
                <p>
                    Hello <strong>step</strong> (not <strong>step</strong>? 
                    
                        <a href="https://carawoman.co/my-account/customer-logout/?_wpnonce=fb12e1f610">Log out</a>)
                </p>
                {{-- <p>Welcome to your account dashboard!</p> --}}
                <p>
                    From your account dashboard you can view your 
                    <a href="https://carawoman.co/my-account/orders/">recent orders</a>, 
                    manage your <a href="https://carawoman.co/my-account/edit-address/">
                    shipping and billing addresses</a>, and <a href="https://carawoman.co/my-account/edit-account/">
                    edit your password and account details</a>.</p>
            </div>
        </div>
    </div>
{{-- </body> --}}
{{-- </html> --}}


{{--  --}}



{{-- 
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

                    {{ __('You are logged in!') }} --}}

                    {{--  --}}

                    {{-- @auth --}}
                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> --}}
                    {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a> --}}
                    {{-- <a href="{{ route('logout') }}"
                       class="ml-4 text-sm text-gray-700 underline"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a> --}}
                    
                {{-- @else --}}
                    {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif --}}
                {{-- @endauth --}}

                    {{--  --}}





{{-- 
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div style="padding-top:10%;"></div>

@endsection
