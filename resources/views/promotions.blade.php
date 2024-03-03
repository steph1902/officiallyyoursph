@extends('layouts.app')
@section('content')

<div style="padding-top:7%"></div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{url('collections')}}">
                    <img src="{{ asset('banners/promo-banner.png') }}" alt="Promo Banner" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</section>

<div style="padding-bottom:7%"></div>

@endsection