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
                    <h1 class="hermione-font">Contact Us</h1>
                    <h6 class="futura-lt-bt">

                        Officially Yours | Designer Dress RTW Philippines <br>
                        Specially Curated International Fashion Brands <br>
                        Shop online 24/7 : DM / Whatsapp / Viber <br> <br>

                        +63 90 6449 5863 (Viber) <br>
                        <a href="https://api.whatsapp.com/send/?phone=639064495863&text&type=phone_number&app_absent=0" target="_blank">
                            +63 90 6449 5863 (Whatsapp)
                        </a>
                                        
                        {{-- All items are crafted to order within a production timeframe of 
                        <u>10 to 21 working days</u>. <br> Should you require expedited delivery, kindly inform us, 
                        and we will make every effort to accommodate your request promptly. --}}
                    
                    </h6>
                    {{-- <br><br><br> --}}
                    {{-- <p class="futura-lt-bt">Check our <a class="hermione-font" href="{{url('collections')}}">Vol.1, Enchanté.</a></p> --}}
                </div>
            </div>
        </div>
    </div>
</section>




@endsection