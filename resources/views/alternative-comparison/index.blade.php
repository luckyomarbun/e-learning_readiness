@extends('layouts/private')

@section('container')
<div class="row justify-content-center">

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('err'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('err') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-lg-10">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h1>Perbandingan Alternatif</h1>
            </div>
        </div>
        <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Perbandingan Alternatif - Kriteria</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead class="bg-gradient-primary">
                            <tr class="text-white">
                                <th>Nama Kriteria</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criterias as $criteria)
                            <tr class="table-row" data-href="/calculate/alternative-comparison/{{ $criteria->id }}">
                                <td>{{ $criteria->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <!-- <div class="text-center">
                        <button class="btn btn-primary btn">
                            <span class="text">Submit</span>
                        </button>
                    </div> -->
            </div>
        </div>

    </div>
</div>
@endsection
