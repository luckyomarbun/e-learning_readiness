@extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang</h6>
            </div>
            <div class="card-body">
                <p>Halo {{ auth()->user()->username }}, selamat datang di aplikasi sistem E-Learning Readiness</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jumlah Civitas Telkom University</h6>
            </div>
            <div class="card-body">
                <p>Jumlah Civitas: {{$userCount}}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jumlah Orang yang Sudah Mengisi Survei</h6>
            </div>
            <div class="card-body">
                <p>Jumlah yang Sudah Mengisi Survei: {{$userCountSurvey}}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hasil Survei</h6>
            </div>
            <div class="card-body">
                <!-- Tampilkan diagram pie chart hasil survei -->
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jumlah Peserta Survei yang Lolos berdasarkan Tahun Masuk</h6>
            </div>
            <div class="card-body">
                <!-- Tampilkan diagram batang jumlah peserta survei yang lolos berdasarkan tahun masuk -->
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript_content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

// Mendapatkan data untuk diagram pie chart
    var pieData = {
        labels: ['Ready Go Ahead', 'Need a Few Improvement', 'Need Some Work','Need A Lot of Work'],
        datasets: [{
            data: {{Js::from($pieData) }},
            backgroundColor: ['#36a2eb','#24fc03', '#ffcd56','#ff6384'],
            hoverBackgroundColor: ['#36a2eb','#24fc03','#ffcd56', '#ff6384']
        }]
    };


    // Mendapatkan data untuk diagram batang
    var barData = {
        labels: {{Js::from($data['years']) }}, // Ubah dengan data tahun masuk yang sesuai
        datasets: [{
            label: 'Jumlah yang Lolos',
            backgroundColor: '#36a2eb',
            borderColor: '#36a2eb',
            data: {{Js::from($data['total']) }}, // Ubah dengan data jumlah yang lolos berdasarkan tahun masuk yang sesuai
        }]
    };

    // Inisialisasi diagram pie chart
    var pieChart = new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: pieData,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Inisialisasi diagram batang
    var barChart = new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: barData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection

