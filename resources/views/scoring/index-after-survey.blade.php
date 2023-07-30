@extends('layouts/public')
@section('styles')
    <!-- Add any additional styles here if needed -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles specific to this page */
        /* ... (your existing styles) ... */

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
            font-size: 2.5rem;
            font-weight: bold;
            color: #4e73df;
            margin-bottom: 0.5rem;
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
            font-size: 1.5rem;
        margin-right: 8px;
        }

        .section-info {
            display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.5rem;
        }

        .section-name {
            flex: 1;
        font-size: 1.2rem;
        }

        .colon {
        flex: 0;
        font-size: 1.2rem;
        margin: 0 8px;
    }

<<<<<<< HEAD
    .section-score {
        flex: 1;
        font-size: 1.2rem;
        font-weight: bold;
        color: #4e73df;
    }

    .suggestion {
        display: flex;
    }

    .suggestion ul {
    }

    .suggestion ul li {
        margin-bottom: 8px;
    }
    
=======
        .section-score {
            flex: 0.5;
            text-align: left;
            margin-left: 20px; 
        }

        .list-suggestion ul {
        text-align: left;
        }

>>>>>>> b64b1255f17d6b33fb80edcd961c83b0733a8717
    </style>
@endsection

@section('container')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4 shadow">
                    <div class="card-header py-3 bg-primary text-white">
                        <h4 class="m-0 font-weight-bold">Thank you for completing the E-Learning Readiness survey</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">This survey evaluates your readiness to engage in e-learning activities
                            effectively and efficiently. Your responses will help identify areas where you may need additional support or resources to enhance your e-learning experience. Thank you for your participation!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="bi bi-bar-chart-fill" style="font-size: 1.5rem; margin-right: 8px;"></i>
                        Your Score
                    </h6>                    </div>
                    <div class="card-body text-center">
                        <div class="score-value">{{ number_format(session('final_score'), 2) }}</div>
                        @php
                            $final_score = session('final_score');
                        @endphp

                        @if ($final_score < 2.6)
                            <div class="score-summary">Not ready - needs a lot of work</div>
                        @elseif ($final_score >= 2.6 && $final_score < 3.4)
                            <div class="score-summary">Not ready - needs some work</div>
                        @elseif ($final_score >= 3.4 && $final_score < 4.2)
                            <div class="score-summary">Ready but needs some improvement</div>
                        @elseif ($final_score >= 4.2 && $final_score <= 5)
                            <div class="score-summary">Ready - go ahead!</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h6 class="m-0 font-weight-bold">
                <i class="bi bi-file-text" style="font-size: 1.5rem; margin-right: 8px;"></i>
                Description
            </h6>
        </div>
        <div class="card-body text-center">
            @php
                $final_score = session('final_score');
            @endphp
            @foreach (session('sections') as $section)
            <div class="section-info" style="display: flex; align-items: center; margin-bottom: 0.5rem;">
    <div class="section-icon" style="margin-right: 10px;">
        <!-- Add icons here (e.g., Bootstrap Icons) for each category -->
        @if ($section['name'] === 'Technological Skills')
            <i class="bi bi-gear"></i>
        @elseif ($section['name'] === 'Study Habits & Skills')
            <i class="bi bi-book"></i>
        @elseif ($section['name'] === 'Cognitive Preseence')
            <i class="bi bi-lightbulb"></i>
        @elseif ($section['name'] === 'Teaching Preseence')
            <i class="bi bi-person-check"></i>
        @elseif ($section['name'] === 'Social Preseence')
            <i class="bi bi-people"></i>
        @endif
    </div>
    <div class="section-name text-left" style="flex: 1; margin: 0 5rem;">
        <strong>{{ $section['name'] }}</strong>
    </div>
    <div class="colon" style="flex: 0; font-size: 1.2rem; margin: 0 8px;">:</div>
    <div class="section-score" style="flex: 1; font-size: 1.2rem; font-weight: bold; color: #4e73df;">
        {{ number_format($section['score'], 2) }}
    </div>
</div>

            @endforeach
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white" style="margin-bottom: 20px">
                    <h6 class="m-0 font-weight-bold">
                        <i class="bi bi-check-square" style="font-size: 1.5rem; margin-right: 8px;"></i>
                        Suggestion
                    </h6>
                </div>
                <div class="card-body text-center" style="padding: 0 35%">
                    @foreach (session('sections') as $section)
                        <div class="section-info mb-3">
                            <div class="section-name">
                                <strong>{{ $section['name'] }}</strong>
                            </div>
                        </div>
                        <div class="suggestion text-center py-3"> <!-- Add class "text-center" and "py-3" for vertical padding -->
                            @if ($section['name'] === 'Technological Skills' && $section['score'] < 0.84)
                                <div class="text-left">
                                    <ul>
                                        <li>Take technology training before starting e-learning.</li>
                                        <li>Use step-by-step guides to master the learning platform.</li>
                                        <li>Get technical support through Q&A sessions.</li>
                                    </ul>
                                </div>
<<<<<<< HEAD
                            @elseif ($section['name'] === 'Study Habits & Skills' && $section['score'] < 0.84)
                                <div class="text-left">
                                    <ul >
                                        <li>Manage your time by creating an efficient study schedule.</li>
                                        <li>Utilize effective learning methods, such as note-taking and active participation.</li>
                                        <li>Evaluate your learning progress independently for improvement.</li>
                                    </ul>
                                </div>
                            @elseif ($section['name'] === 'Cognitive Preseence' && $section['score'] < 0.84)
                                <div class="text-left">
                                    <ul >
                                        <li>Assign collaborative tasks and projects that encourage critical thinking.</li>
                                        <li>Facilitate in-depth online discussions to enhance understanding.</li>
                                        <li>Provide constructive feedback to students.</li>
                                    </ul>
                                </div>
                            @elseif ($section['name'] === 'Teaching Preseence' && $section['score'] < 0.84)
                                <div class="text-left">
                                    <ul >
                                        <li>Provide clear and structured learning guidance.</li>
                                        <li>Offer timely and informative feedback.</li>
                                        <li>Provide additional support to students in need.</li>
                                    </ul>
                                </div>
                            @elseif ($section['name'] === 'Social Preseence' && $section['score'] < 0.84)
                                <div class="text-left">
                                    <ul >
                                        <li>Facilitate social interaction through discussion forums and group projects.</li>
                                        <li>Create a friendly and inclusive virtual environment.</li>
                                        <li>Encourage sharing of ideas and experiences in online discussions.</li>
                                    </ul>
                                </div>
                            @else
                                <p>Ready to Go</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
=======
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
>>>>>>> b64b1255f17d6b33fb80edcd961c83b0733a8717
        </div>
    </div>
</div>



            
        </div>

        <!-- Back to Survey button -->
        <div class="row justify-content-center mt-4">
            <div class="col-lg-2 text-center">
                <a href="{{ route('survey') }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    </div>
@endsection
