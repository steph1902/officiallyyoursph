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
                    <h1 class="hermione-font">Coming Soon</h1>
                    <h6 class="futura-lt-bt">Stay Tuned</h6>
                    <br><br><br>
                    <p class="futura-lt-bt">Check our <a class="hermione-font" href="{{url('collections')}}">Vol.1, Enchanté.</a></p>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection