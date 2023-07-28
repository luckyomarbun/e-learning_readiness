@extends('layouts/public')
@section('styles')
    <style>

        .card-header {
            text-align: center;
        }

        .score-card {
            background-color: #f8f9fc;
            border: 1px solid #d1d3e2;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            height: 210px;
        }

        .suggestion-card {
            background-color: #f8f9fc;
            border: 1px solid #d1d3e2;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
        }

        .score-value {
            font-size: 3rem;
            font-weight: bold;
            color: #4e73df;
        }

        .score-summary {
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* Additional styling for the card */
        .score-card .card-header {
            background-color: #4e73df;
            color: #fff;
            border-bottom: none;
            border-radius: 5px 5px 0 0;
            padding: 15px;
        }

        .score-card .card-body {
            padding-top: 0;
        }

        .score-card .card-body p {
            margin-bottom: 0;
        }

        .score-icon {
            font-size: 3rem;
            margin-top: 10px;
        }

        .section-info {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .section-name {
            flex: 0.5;
            text-align: left;
            margin-left: 20%;
        }

        .colon {
            flex: 0;
            text-align: center;
            width: 20px; /* Adjust the width of the colon as needed */
        }

        .section-score {
            flex: 0.5;
            text-align: left;
            margin-left: 20px; 
        }

        .list-suggestion ul {
        text-align: left;
        }

    </style>
@endsection
@section('container')
    <div class="row" style="margin-top: 20px;">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">Thank you for completing E-Learning Readiness survey</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-justify"> This survey evaluates your readiness to engage in e-learning activities
                            effectively and efficiently. Your responses to the survey will be used to identify areas where you
                            may need additional support or resources to enhance your e-learning experience. Thank you for your
                            participation!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="card shadow mb-4 score-card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-center">Your Score</h6>
                    </div>
                    <div class="card-body">
                        <div class="score-value">{{ session('final_score') }}</div>
                        @php
                        $final_score = session('final_score');
                        @endphp

                        @if ($final_score >= 1 && $final_score < 2.6)
                            <div class="score-summary">Not ready needs a lot of work</div>
                        @elseif ($final_score >= 2.6 && $final_score < 3.4)
                            <div class="score-summary">Not ready needs some work</div>
                        @elseif ($final_score >= 3.4 && $final_score < 4.2)
                            <div class="score-summary">Ready but needs a few improvement</div>
                        @elseif ($final_score >= 4.2 && $final_score <= 5)
                            <div class="score-summary">Ready go ahead</div>
                        @else 
                            <div class="score-summary">Invalid</div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card shadow mb-4 score-card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-center">Description</h6>
                    </div>
                    <div class="card-body">
                        @php
                            $final_score = session('final_score');
                        @endphp
                        @foreach (session('sections') as $section)
                            <div class="section-info">
                                <div class="section-name">
                                    <strong>{{ $section['name'] }}</strong>
                                </div>
                                <div class="colon"> : </div>
                                <div class="section-score"> {{ $section['score'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card shadow mb-4 suggestion-card">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-center">Suggestion</h6>
                            </div>
                            <div class="card-body">
                                @php
                                    $final_score = session('final_score');
                                @endphp
                                @foreach (session('sections') as $section)
                                    <div class="section-info">
                                        <div class="section-name">
                                            <strong>{{ $section['name'] }}</strong>
                                        </div>
                                    </div>
                                    <div class="suggestion">
                                        @if ($section['name'] === 'Technological Skills' && $section['score'] < 4.2)
                                            <div class="list-suggestion">
                                                <ul>
                                                    <li>Ikuti pelatihan teknologi sebelum memulai e-learning.</li>
                                                    <li>Gunakan panduan langkah-demi-langkah untuk menguasai platform pembelajaran.</li>
                                                    <li>Dapatkan dukungan teknologi melalui sesi tanya jawab.</li>
                                                </ul>
                                            </div>
                                        @elseif ($section['name'] === 'Study Habits & Skills' && $section['score'] < 4.2)
                                            <div class="list-suggestion">
                                                <ul>
                                                    <li>Atur manajemen waktu dengan membuat jadwal belajar yang efisien.</li>
                                                    <li>Gunakan metode belajar efektif seperti pembuatan catatan dan partisipasi aktif.</li>
                                                    <li>Evaluasi kemajuan belajar secara mandiri untuk perbaikan.</li>
                                                </ul>
                                            </div>
                                        @elseif ($section['name'] === 'Cognitive Preseence' && $section['score'] < 4.2)
                                            <div class="list-suggestion">
                                                <ul>
                                                    <li>Gunakan tugas dan proyek kolaboratif yang mendorong pemikiran kritis.</li>
                                                    <li>Fasilitasi diskusi online yang mendalam untuk meningkatkan pemahaman.</li>
                                                    <li>Berikan umpan balik konstruktif kepada siswa.</li>
                                                </ul>
                                            </div>                                
                                        @elseif ($section['name'] === 'Teaching Preseence' && $section['score'] < 4.2)
                                            <div class="list-suggestion">
                                                <ul>
                                                    <li>Berikan panduan pembelajaran yang jelas dan terstruktur.</li>
                                                    <li>Berikan umpan balik tepat waktu dan informatif.</li>
                                                    <li>Sediakan dukungan tambahan bagi siswa yang membutuhkan.</li>
                                                </ul>
                                            </div>  
                                        @elseif ($section['name'] === 'Social Preseence' && $section['score'] < 4.2)
                                            <div class="list-suggestion">
                                                <ul>
                                                    <li>Fasilitasi interaksi sosial melalui forum diskusi dan proyek kelompok.</li>
                                                    <li>Ciptakan lingkungan virtual yang ramah dan inklusif.</li>
                                                    <li>Dorong berbagi ide dan pengalaman dalam diskusi online.</li>
                                                </ul>
                                            </div>
                                        {{-- @else 
                                            <div class="list-suggestion">
                                                <ul>
                                                    <li>Ready to Go</li>
                                                </ul>
                                            </div> --}}
                                        @endif 
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
            

            <!-- Back to Survey button -->
            <div class="row justify-content-center">
                <div class="col-lg-5"></div>
                <div class="col-lg-2 d-flex justify-content-center">
                    <a href="{{ route('survey') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="col-lg-5"></div>
            </div>
        </div>
    @endsection
