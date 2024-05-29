@extends('layouts.app')
@section('content')

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
                        <tr>
                            @if(Auth::user()->address)
                                <th colspan="4" class="text-right">Shipping Cost:</th>                        
                                <td id="shipping">Free</td>
                            @else
                                <th colspan="4" class="text-right">Shipping Cost:</th>
                                <td id=""> <a href="{{url('home')}}"> Please complete your address first </td> </a>                        
                            @endif
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Total:</th>
                            <td id="total">Rp 419,000</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

    <div style="padding-bottom:5%;"></div>





    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            calculateShipping();
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
    </script>
    



@endsection
