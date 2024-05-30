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

<div style="padding-top:7%;"></div>

<section id="coming-soon-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="coming-soon-text">
                    <h1 class="hermione-font">Shipping and Delivery</h1>
                    <h6 class="futura-lt-bt">
                        {{-- Shipping & Delivery --}}
<p style="text-align: left;">
Domestic delivery process may take 2-7 business days. We also accept international order 
which you can order by contacting us directly through our Email or WhatsApp. International shipping may take longer depends on the destination. 
Your total shipping fee depends on the final destination of the shipping address. 
Total fees may change depending on the quantity or weight of your package.
</p>

<p style="text-align: left;">
We will deliver your order after we have received your payment in the full amount. Please take into consideration that we operate from Monday to Friday. 
Therefore, payment confirmation received on weekends and holidays will be processed on the next business days. 
</p>

<p style="text-align: left;">
We do not take responsibility for any risk of loss of the merchandise after delivery has been confirmed at your shipping address. 
We are not responsible for any shipping delay due to incomplete address, misspelled address or no recipient at the address and also mistakes made by the courier. 
Free shipping will be given for cases that are due to our oversight.
</p>
                        
                        {{-- All items are crafted to order within a production timeframe of 
                        <u>10 to 21 working days</u>. <br> Should you require expedited delivery, kindly inform us, 
                        and we will make every effort to accommodate your request promptly. --}}
                    
                    </h6>
                    {{-- <br><br><br>
                    <p class="futura-lt-bt">
                        <a class="hermione-font" href="{{url('contact-us')}}">Contact Us</a>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<div style="padding-top:7%;"></div>




@endsection