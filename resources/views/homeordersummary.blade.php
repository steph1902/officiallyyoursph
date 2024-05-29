@extends('layouts.app')
@section('content')

{{--  --}}
    <style>
        .order-summary {
            border: 1px solid #eee;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .order-summary div {
            flex-basis: 20%;
        }

        .order-summary .order-details {
            font-weight: bold;
        }

        .order-summary .date {
            color: #777;
        }

        .order-summary .status {
            color: #f04;
        }

        .order-summary .total {
            font-weight: bold;
            font-size: 1rem;
        }

        .order-summary .actions {
            display: flex;
            justify-content: flex-end;
        }

        .order-summary .actions button {
            margin-left: 5px;
            padding: 5px 10px;
            border-radius: 3px;
            border: none;
            cursor: pointer;
            background-color: #f04;
            color: white;
            font-size: 0.9rem;
        }

        .order-summary .actions button:hover {
            background-color: #d03;
        }

        .order-summary .actions button:first-child {
            background-color: #44b700;
        }

        .order-summary .actions button:first-child:hover {
            background-color: #3e9e00;
        }
    </style>
{{--  --}}

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

                {{-- Illuminate\Support\Collection {#407 ▼
                    #items: array:4 [▼
                      0 => {#1158 ▼
                        +"id": 1
                        +"external_id": "INVOICE-RASWK"
                        +"user_id": "1"
                        +"status": "PENDING"
                        +"merchant_name": "Officially Yours Phillipines"
                        +"merchant_profile_picture_url": "https://xnd-merchant-logos.s3.amazonaws.com/business/production/65e079f7002c6305961d82b6-1709284182329.jpeg"
                        +"amount": 8078
                        +"description": "INVOICE-RASWK"
                        +"expiry_date": null
                        +"invoice_url": "https://checkout-staging.xendit.co/v2/6656d389bc26893ccbfc2886"
                        +"should_exclude_credit_card": 0
                        +"should_send_email": 0
                        +"created_at": "2024-05-29 07:04:41"
                        +"updated_at": "2024-05-29 07:04:41"
                        +"currency": "PHP"
                        +"reminder_date": null
                        +"metadata": null
                      }
                      1 => {#406 ▼
                        +"id": 2
                        +"external_id": "INVOICE-CA8E9"
                        +"user_id": "1"
                        +"status": "PENDING"
                        +"merchant_name": "Officially Yours Phillipines"
                        +"merchant_profile_picture_url": "https://xnd-merchant-logos.s3.amazonaws.com/business/production/65e079f7002c6305961d82b6-1709284182329.jpeg"
                        +"amount": 8078
                        +"description": "INVOICE-CA8E9"
                        +"expiry_date": null
                        +"invoice_url": "https://checkout-staging.xendit.co/v2/6656d39711961dacc51a0f48"
                        +"should_exclude_credit_card": 0
                        +"should_send_email": 0
                        +"created_at": "2024-05-29 07:04:55"
                        +"updated_at": "2024-05-29 07:04:55"
                        +"currency": "PHP"
                        +"reminder_date": null
                        +"metadata": null
                      }
                      2 => {#750 ▶}
                      3 => {#408 ▶}
                    ]
                    #escapeWhenCastingToString: false
                  } --}}

                {{--  --}}
                @php
                    use Carbon\Carbon;
                    // Misalnya, $originalDate berasal dari database atau variabel lain
                    // $originalDate = '2023-03-15'; // Ini bisa berupa variabel dinamis
                    // $formattedDate = Carbon::parse($originalDate)->format('d F Y');
                @endphp

                {{-- <p class="date">Date: {{ $formattedDate }}</p> --}}




                <h1 class="mb-4">My Orders</h1>

                @foreach ($orders as $order)                                    
                    <div class="order-summary">
                        <div class="order-details">
                            <p>{{$order->external_id}}</p>
                            {{-- <p class="date">Date: 2023-03-15</p> --}}

                            
                                {{-- use Carbon\Carbon; --}}
                                
                            

                            <p class="date">
                                Date: {{ Carbon::parse($order->created_at)->format('d F Y') }}
                                
                            </p>

                        </div>
                        <div class="status">
                            <p>Status: Pending</p>
                        </div>
                        <div class="total">
                            <p>Total: ₱ {{ number_format($order->amount,0) }}  </p>
                        </div>
                        <div class="actions">
                            <a target="_blank" href="{{$order->invoice_url}}"><button>Proceed Payment</button></a>
                            {{-- <button>Download</button> --}}
                            
                            <a target="_blank" href="{{url('view-invoice/'.$order->external_id)}}">
                                <button>View Details</button>
                            </a>
                            {{-- <button>Cancel</button> --}}
                        </div>
                    </div>
                @endforeach

                {{--  --}}
                     
            </div>
        </div>
    </div>

<div style="padding-top:10%;"></div>




@endsection
