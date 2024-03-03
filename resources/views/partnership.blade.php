@extends('layouts.app')
@section('content')

<style>
    #coming-soon-section {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.coming-soon-text h1 {
    font-size: 3em;
    margin-bottom: 10px;
}

.coming-soon-text p {
    font-size: 1.25em;
    margin: 0;
    padding: 1em;
}

</style>

<div style="padding-top:10%;"></div>

{{-- ok --}}


<div class="container">
    <div class="row justify-content-center">

        




        <div class="col-md-8 text-center">
            <h2>Partnership</h2>
            <p>If you are interested in having a vision and mission aligned with ours, we are open to partnership opportunities. Please fill in the details below and we will contact you shortly.</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('post-store-partnership-data') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="fullName" placeholder="Enter your full name">
                    @error('full_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" id="phoneNumber" placeholder="Enter your phone number">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter your message"></textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <br>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        </div>
    </div>
</div>

{{-- ok --}}


<div style="padding-top:10%;"></div>




@endsection