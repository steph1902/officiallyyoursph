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

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Downloads</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ 'my-account/address' }}">Addresses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Account details</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">

                {{--  --}}
                {{--  --}}
                            <h1 class="mb-4">Shipping address</h1>
                            {{-- <form method="POST" action="{{ route('save-address') }}"> --}}
                                {{-- store-my-account-address --}}
                                @csrf

                                <div class="form-group">
                                    <label for="first_name">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" disabled>
                                </div>
                
                                <div class="form-group">
                                    <label for="first_name">First name *</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{Auth::user()->name}}" required>
                                </div>
                
                                <div class="form-group">
                                    <label for="last_name">Last name *</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                
                                {{-- <div class="form-group">
                                    <label for="company_name">Company name (optional)</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name">
                                </div> --}}
                
                                {{-- <div class="form-group">
                                    <label for="country">Country/Region *</label>
                                    <select class="form-control" id="country" name="country" required>
                                        <option value="ID" selected>Indonesia</option>
                                    </select>
                                </div> --}}
                
                                <div class="form-group">
                                    <label for="street_address">Street address *</label>
                                    <input type="text" class="form-control" id="street_address" name="street_address" required>
                                    <br>
                                    <button type="button" class="btn btn-primary" id="get-location-btn">Get Current Location</button>
                                    <small></small>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="customer_latitude" name="customer_latitude">
                                    <input class="form-control" type="hidden" id="customer_longitude" name="customer_longitude">
                                </div>



                
                                <div class="form-group">
                                    <label for="phone_number">Phone number *</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                                </div>
                
                                <button type="submit" class="btn btn-primary">Save address</button>
                            </form>
                     
            </div>
        </div>
    </div>

<div style="padding-top:10%;"></div>


<script>

document.getElementById('get-location-btn').addEventListener('click', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getAddress);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
});



    function getAddress(position) {
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;

    // Use the Nominatim API to get the address based on the latitude and longitude
    const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.address) {
                const address = [
                    data.address.road,
                    data.address.suburb,
                    data.address.city,
                    data.address.state,
                    data.address.country,
                    data.address.postcode
                ].filter(x => x).join(', ');
                document.getElementById('street_address').value = address;
                document.getElementById('customer_latitude').value = lat;
                document.getElementById('customer_longitude').value = lng;
            } else {
                alert("Unable to retrieve address.");
            }
        })
        .catch(error => {
            console.error('Error fetching address:', error);
            alert("Terjadi kesalahan saat mencari alamat. Coba lagi nanti.");
        });
}
</script>

@endsection
