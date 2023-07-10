@extends('layouts/home')

@section('container')
<div class="row justify-content-center text-light">
    <div class="col-md-7 d-flex align-items-center mb-5 mt-5">
        <div class="row text-center justify-content-center">
            <img src="{{ asset('img/ahp.png') }}" alt="ahp" style="width: auto; height: 450px">
            <h1><b>E-Learning Readiness</b></h1>
            <h5>Mengukur nilai kesiapan mahasiswa dalam pelaksanaan <i>e-learning</i>.<br>(Telkom University)</h5>
            <!-- <a type="button" class="btn btn-outline-light rounded-pill d-grid gap-2 col-4 mt-3 mr-5">Tentang</a> -->
            <a href="/login" type="button" class="btn btn-outline-light rounded-pill d-grid gap-2 col-4 mt-3">Masuk</a>
        </div>
    </div>
{{--    <div class="col-md-4 mt-5 mb-5">--}}
{{--        <img src="img/home.png" alt="home" style=" width: 800px; ">--}}
{{--    </div>--}}
</div>
@endsection