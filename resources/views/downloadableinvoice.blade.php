<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .invoice-header h2 {
            margin: 0;
        }
        .invoice-header p {
            font-size: 14px;
            color: #777;
        }
        .invoice-body {
            margin-bottom: 20px;
        }
        .invoice-body table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-body th,
        .invoice-body td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .invoice-body th {
            background-color: #f2f2f2;
            font-weight: normal;
        }
        .invoice-body .total-row {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .invoice-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #777;
        }
        .invoice-footer p {
            margin: 0;
        }
    </style>
</head>

@php
    use Carbon\Carbon;
@endphp


{{-- 
{#376 ▼
    +"id": 4
    +"external_id": "INVOICE-VYYBH"
    +"user_id": "1"
    +"status": "PENDING"
    +"merchant_name": "Officially Yours Phillipines"
    +"merchant_profile_picture_url": "https://xnd-merchant-logos.s3.amazonaws.com/business/production/65e079f7002c6305961d82b6-1709284182329.jpeg"
    +"amount": 8078
    +"description": "INVOICE-VYYBH"
    +"expiry_date": null
    +"invoice_url": "https://checkout-staging.xendit.co/v2/6656d3be11961dfe581a0fa0"
    +"should_exclude_credit_card": 0
    +"should_send_email": 0
    +"created_at": "2024-05-29 07:05:35"
    +"updated_at": "2024-05-29 07:05:35"
    +"currency": "PHP"
    +"reminder_date": null
    +"metadata": null
  } --}}


<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h2>INVOICE</h2>
            <p>
                {{$orders->external_id}}
                <br>
                Order Date: {{ Carbon::parse($orders->created_at)->format('d F Y') }}
            </p>
        </div>
        <div class="invoice-body">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orderDetails as $detail)                                            
                        <tr>
                            <td>
                                Product Name: {{$detail->product_name}}<br>
                                Color: {{$detail->product_color}}<br>
                                Size: {{$detail->product_size}}<br>                                
                                  
                            </td>
                            <td>1</td>
                            <td>₱ {{ number_format($detail->product_price,0) }}</td>
                        </tr>
                    @endforeach

                    {{-- #items: array:2 [▼
                    0 => {#378 ▼
                      +"id": 3
                      +"invoice_id": "INVOICE-VYYBH"
                      +"customer_id": "1"
                      +"product_name": "Adeline Dress"
                      +"product_price": 3900
                      +"product_image": null
                      +"product_size": "S"
                      +"product_color": "Black"
                      +"created_at": "2024-05-29 07:05:35"
                      +"updated_at": "2024-05-29 07:05:35" --}}


                    {{-- <tr class="total-row">
                        <td colspan="2">Subtotal</td>
                        <td>Rp1,118,000</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="2">Shipping</td>
                        <td>Rp15,000 via Shipping</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="2">Shipping Fee</td>
                        <td>Rp200,000</td>
                    </tr> --}}

                    <tr class="total-row">
                        <td colspan="2">Shipping Cost</td>
                        <td>₱ {{ number_format($orders->shipping_cost,0) }}</td>
                    </tr>

                    <tr class="total-row">
                        <td colspan="2">Subtotal</td>
                        <td>₱ {{ number_format($orders->amount - $orders->shipping_cost , 0) }}</td>
                    </tr>

                    <tr class="total-row">
                        <td colspan="2">Total (With Shipping Cost)</td>
                        <td>₱ {{ number_format($orders->amount,0) }}</td>
                    </tr>



                </tbody>
            </table>
        </div>
        <div class="invoice-footer">
            <p>Billed To:</p>
            <p>
                {{-- Illuminate\Support\Collection {#383 ▼
                    #items: array:1 [▼
                      0 => {#382 ▼
                        +"id": 1
                        +"name": "supermochi"
                        +"email": "supermochi@gmail.com"
                        +"email_verified_at": null
                        +"password": "$2y$10$XbP5LTuPLQhjb1UJO9pn5.ACZygNsbqm1luSMjk10xYeeQ64Sp5NK"
                        +"remember_token": null
                        +"created_at": "2024-03-17 05:37:27"
                        +"updated_at": "2024-05-29 04:58:23"
                        +"address": "Jalan Catriona 12, Indonesia, 15560"
                        +"phone_number": "1234567890"
                      }
                    ]
                    #escapeWhenCastingToString: false
                  } --}}
                {{-- Claudia PH --}}
                {{$userInfo->name}}
                <br>
                {{$userInfo->email}}
                <br>
                {{$userInfo->address}}
                {{-- <br>Jl. Gelong baru utara 2G<br>Perumahan de oaze no.1 Tomang<br>Jakarta Barat<br>DKI Jakarta<br>11440 --}}
            </p>
        </div>
    </div>


    {{-- <button id="download-btn">Download as PDF</button>         --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.getElementById("download-btn").addEventListener("click", () => {
            const opt = {
                margin: 1,
                filename: "invoice.pdf",
                image: { type: "jpeg", quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
            };

            // html2pdf().set(opt).from(document.querySelector(".invoice-container")).save();
            html2pdf().from(element).set(opt).save();

        });
    </script>




</body>
</html>