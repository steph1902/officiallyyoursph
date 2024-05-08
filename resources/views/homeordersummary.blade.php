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

                {{--  --}}
                <h1 class="mb-4">My Orders</h1>

                <div class="order-summary">
                    <div class="order-details">
                        <p>Order #12345</p>
                        <p class="date">Date: 2023-03-15</p>
                    </div>
                    <div class="status">
                        <p>Status: Pending</p>
                    </div>
                    <div class="total">
                        <p>Total: $120.00</p>
                    </div>
                    <div class="actions">
                        <button>Pay</button>
                        <button>View</button>
                        <button>Cancel</button>
                    </div>
                </div>

                {{--  --}}
                     
            </div>
        </div>
    </div>

<div style="padding-top:10%;"></div>



@endsection
