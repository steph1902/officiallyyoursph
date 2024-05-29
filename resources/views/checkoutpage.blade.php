@extends('layouts.app')
@section('content')

<style>
    .pay-button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 8px;
    position: right;
}

</style>

<body>

    <div style="padding-top:10%;"></div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Order Received</h1>
                <p>Order number: 14682</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $c)                                                            
                            <tr>
                                <td>{{$c->name}}</td>
                                <td>{{$c->options->color}}</td>
                                <td>{{$c->options->size}}</td>
                                <td>{{$c->qty}}</td>
                                <td>₱ {{number_format($c->price,0)}}</td>                            
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-right">Subtotal:</th>
                            {{-- <td>₱ {{ $subTotal }}</td> --}}
                            {{-- <td id="subtotal">₱ {{ $subTotal }}</td> --}}
                            <td id="subtotal" data-subtotal="{{ $subTotal }}">₱ {{ number_format($subTotal,0) }}</td>


                        </tr>

                        @php
                            $baseFare = 49+50;
                            $shippingCost = $baseFare + (0.01 * $subTotal);
                            $total = $shippingCost + $subTotal;
                        @endphp

                        <tr>
                            @if(Auth::user()->address)
                                <th colspan="4" class="text-right">Shipping Cost:</th>                        
                                <td id="shipping">
                                    ₱  {{$shippingCost}}
                                </td>
                            @else
                                <th colspan="4" class="text-right">Shipping Cost:</th>
                                <td id=""> <a href="{{url('home')}}"> Please complete your address first </td> </a>                        
                            @endif
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Total:</th>
                            <td id="total">₱ {{ number_format($total,0) }}</td>
                        </tr>

                        

                    </tfoot>
                </table>
            </div>

            {{-- <button type="submit" id="payButton" class="pay-button">Create Invoice</button> --}}
            <form method="POST" action="{{ route('createInvoice') }}">
                @csrf
                <!-- Input tersembunyi untuk menyimpan total -->
                <input type="hidden" name="total" id="totalInput" value="{{$total}}">
                
                <!-- Konten lainnya -->
            
                <!-- Tombol submit -->
                {{-- <button type="submit" class="pay-button">Create Invoice</button> --}}
                
                @if (session('invoice_url'))
                    <div class="alert alert-success">
                        <a class="pay-button" href="{{ session('invoice_url') }}" target="_blank">Pay Now</a>
                    </div>
                @else
                    <button type="submit" id="payButton" class="pay-button">Create Invoice</button>
                @endif

                
                



            </form>
            
            




            




        </div>

    </div>

    <div style="padding-bottom:5%;"></div>





    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            calculateShipping();
            updateTotalInput();
        });

        function calculateShipping() {

            var subtotal = {{ $subTotal }};
            var baseFare = 49 + 50;

            var shippingCost;
            if (subtotal < 10000) {
                shippingCost = baseFare + (0.01 * subtotal);
            } 

            document.getElementById('shipping').textContent = '₱ ' + shippingCost.toFixed(2);
            var total = subtotal + shippingCost;
            document.getElementById('total').textContent = '₱ ' + total.toFixed(2);
        }

        function updateTotalInput() {
            var total = document.getElementById('total').textContent;
            total = total.replace('₱ ', ''); // Menghapus mata uang ₱
            total = parseFloat(total.replace(',', '')); // Menghapus koma ribuan dan mengonversi ke float

            // Set nilai total ke dalam input tersembunyi
            document.getElementById('totalInput').value = total.toFixed(2);
        }


        



    </script>
    



@endsection
