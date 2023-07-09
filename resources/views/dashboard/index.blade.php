@extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang</h6>
            </div>
            <div class="card-body">
                <p>Halo {{ auth()->user()->name }}, selamat datang di aplikasi sistem penunjang keputusan penerimaan beasiswa menggunakan metode AHP.</p>
            </div>
        </div>
    </div>
</div>
@endsection
