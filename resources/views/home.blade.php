@extends('layouts/home')

@section('container')
<div class="row justify-content-center text-light">
    <div class="col-md-8 d-flex align-items-center mb-5 mt-5">
        <div class="row text-center justify-content-center">
            <img src="{{ asset('img/al-fath-white.png') }}" alt="Al - Fath School" style="width: 200px; height: 200px">
            <h1><b>Al - Fath School Indonesia</b></h1>
            <h5>Sistem Penunjang Keputusan dengan Metode AHP <br>(Analytical Hierarchy Process)</h5>
            <a type="button" class="btn btn-outline-light rounded-pill d-grid gap-2 col-4 mt-3 mr-5">Tentang</a>
            <a href="/login" type="button" class="btn btn-outline-light rounded-pill d-grid gap-2 col-4 mt-3">Masuk</a>
        </div>
    </div>
{{--    <div class="col-md-4 mt-5 mb-5">--}}
{{--        <img src="img/home.png" alt="home" style=" width: 800px; ">--}}
{{--    </div>--}}
</div>
@endsection
@section('about')
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <img src="img/ahp.png" alt="ahp" style=" width: 750px; ">
        </div>
        <div class="col-md-5 d-flex align-items-center">
            <div class="row">
                <h1><b>AHP (Analytical Hierarchy Process)</b></h1>
                <h5>
                    The Analytic Hierarchy Process (AHP) is a method for organizing and analyzing complex decisions, using math and psychology. It was developed by Thomas L. Saaty in the 1970s and has been refined since then. It contains three parts: the ultimate goal or problem you’re trying to solve, all of the possible solutions, called alternatives, and the criteria you will judge the alternatives on. AHP provides a rational framework for a needed decision by quantifying its criteria and alternative options, and for relating those elements to the overall goal.
                    <br>
                    <br>
                    Stakeholders compare the importance of criteria, two at a time, through pair-wise comparisons. Example, do you care about job benefits or having a short commute more, and by how much more? AHP converts these evaluations into numbers, which can be compared to all of the possible criteria. This quantifying capability distinguishes the AHP from other decision making techniques.
                </h5>
            </div>
        </div>
    </div>
@endsection
