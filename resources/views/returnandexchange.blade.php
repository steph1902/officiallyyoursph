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
                    <h1 class="hermione-font">Return and Exchange Policy</h1>
                    <h6 class="futura-lt-bt">
                        {{-- Shipping & Delivery --}}
<p style="text-align: left;">
    Complaints regarding returns or exchanges must be submitted within a maximum of 48 hours (2 x 24 hours) 
    after receiving the item according to the system.
</p>

<p style="text-align: left;">
    Product return or exchange conditions include the requirement of an unboxing video, and the returned or exchanged product must be in new, 
    unused condition with the hangtag still attached.
</p>

<p style="text-align: left;">
    Products that can be returned or exchanged encompass production defects (damage/defect), 
    incomplete or not as described products upon receipt, and products received in a size different from the one ordered. 
    Prior to initiating a product return, please contact our customer service at <a href="https://wa.me/639064495863"> +63 9064 4958 63  </a>.
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