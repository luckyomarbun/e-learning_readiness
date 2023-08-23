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
                <h6 class="m-0 font-weight-bold text-primary">Rata-Rata Nilai E-Learning Readiness Seluruh Mahasiswa</h6>
            </div>
            <div class="card-body">
                <!-- Tampilkan diagram pie chart hasil survei -->
                <!-- <canvas id="pieChart"></canvas> -->
                <table>
                    <tr>
                      <th>Technological Skills:</th>
                      <td style="padding-left: 40px">{{$average[0]->section_score}}</td>
                    </tr>
                    <tr>
                      <th>Study Habits & Skills:</th>
                      <td style="padding-left: 40px">{{$average[1]->section_score}}</td>
                    </tr>
                    <tr>
                      <th>Cognitive Presence:</th>
                      <td style="padding-left: 40px">{{$average[2]->section_score}}</td>
                    </tr>
                    <tr>
                      <th>Teaching Presence:</th>
                      <td style="padding-left: 40px">{{$average[3]->section_score}}</td>
                    </tr>
                    <tr>
                      <th>Social Presence:</th>
                      <td style="padding-left: 40px">{{$average[4]->section_score}}</td>
                    </tr>
                  </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jumlah Peserta Survei dengan status Ready berdasarkan Tahun Masuk</h6>
            </div>
            <div class="card-body">
                <!-- Tampilkan diagram batang jumlah peserta survei dengan status Ready berdasarkan tahun masuk -->
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
            label: 'Technological Skills',
            backgroundColor: '#36a2eb',
            borderColor: '#36a2eb',
            data: {{Js::from($data['section1']) }}, // Ubah dengan data jumlah yang lolos berdasarkan tahun masuk yang sesuai
        },
        {
            label: 'Study Habits & Skills',
            backgroundColor: 'rgba(255, 99, 132, 0.8)', // Bold red color with transparency
            borderColor: 'rgba(255, 99, 132, 1)',
            data: {{Js::from($data['section2']) }}, // Ubah dengan data jumlah yang lolos berdasarkan tahun masuk yang sesuai
        },
        {
            label: 'Cognitive Presence',
            backgroundColor: 'rgba(0, 204, 102, 0.8)', // Bold green color with transparency
            borderColor: 'rgba(0, 204, 102, 1)',
            data: {{Js::from($data['section3']) }}, // Ubah dengan data jumlah yang lolos berdasarkan tahun masuk yang sesuai
        },
        {
            label: 'Teaching Presence',
            backgroundColor: 'rgba(255, 156, 0, 0.8)', // Bold orange color with transparency
            borderColor: 'rgba(255, 156, 0, 1)',
            data: {{Js::from($data['section4']) }}, // Ubah dengan data jumlah yang lolos berdasarkan tahun masuk yang sesuai
        },
        {
            label: 'Social Presence',
            backgroundColor: 'rgba(128, 0, 128, 0.8)', // Bold purple color with transparency
            borderColor: 'rgba(128, 0, 128, 1)',
            data: {{Js::from($data['section5']) }}, // Ubah dengan data jumlah yang lolos berdasarkan tahun masuk yang sesuai
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

