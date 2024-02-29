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
    font-size: 1.5em;
    margin: 0;
}

</style>

<section id="coming-soon-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="coming-soon-text">
                    <h1 class="hermione-font">Shipping and Delivery</h1>
                    <h6 class="futura-lt-bt">
                        
                        All items are crafted to order within a production timeframe of 
                        <u>10 to 21 working days</u>. <br> Should you require expedited delivery, kindly inform us, 
                        and we will make every effort to accommodate your request promptly.
                    
                    </h6>
                    <br><br><br>
                    <p class="futura-lt-bt">
                        <a class="hermione-font" href="{{url('contact-us')}}">Contact Us</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection