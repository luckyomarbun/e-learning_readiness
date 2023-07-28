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

    .section-score {
        flex: 1;
        font-size: 1.2rem;
        font-weight: bold;
        color: #4e73df;
    }

    .suggestion {
        text-align: left;
    }

    .suggestion ul {
        list-style-type: none;
        padding-left: 0;
        text-align: left;
    }

    .suggestion li {
        margin-bottom: 8px;
    }

    .suggestion li:before {
        content: "\2022";
        color: #4e73df;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        position: absolute;
        left: 0;
    }
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
                        <div class="score-value">{{ session('final_score') }}</div>
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
                <div class="section-info">
                    <div class="section-icon">
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
                    <div class="section-name">
                        <strong>{{ $section['name'] }}</strong>
                    </div>
                    <div class="colon">:</div>
                    <div class="section-score">{{ $section['score'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="col-lg-12 mb-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h6 class="m-0 font-weight-bold text-center">Suggestion</h6>
        </div>
        <div class="card-body text-center">
            @php
                $final_score = session('final_score');
            @endphp
            @foreach (session('sections') as $section)
                <div class="section-info mb-3">
                    <div class="section-name">
                        <strong>{{ $section['name'] }}</strong>
                    </div>
                </div>
                <div class="suggestion">
                    @if ($section['name'] === 'Technological Skills' && $final_score < 4.2)
                        <ul class="text-center">
                            <li>Take technology training before starting e-learning.</li>
                            <li>Use step-by-step guides to master the learning platform.</li>
                            <li>Get technical support through Q&A sessions.</li>
                        </ul>
                    @elseif ($section['name'] === 'Study Habits & Skills' && $final_score < 4.2)
                        <ul class="text-center">
                            <li>Manage your time by creating an efficient study schedule.</li>
                            <li>Utilize effective learning methods, such as note-taking and active participation.</li>
                            <li>Evaluate your learning progress independently for improvement.</li>
                        </ul>
                    @elseif ($section['name'] === 'Cognitive Presence' && $final_score < 4.2)
                        <ul class="text-center">
                            <li>Assign collaborative tasks and projects that encourage critical thinking.</li>
                            <li>Facilitate in-depth online discussions to enhance understanding.</li>
                            <li>Provide constructive feedback to students.</li>
                        </ul>
                    @elseif ($section['name'] === 'Teaching Presence' && $final_score < 4.2)
                        <ul class="text-center">
                            <li>Provide clear and structured learning guidance.</li>
                            <li>Offer timely and informative feedback.</li>
                            <li>Provide additional support to students in need.</li>
                        </ul>
                    @elseif ($section['name'] === 'Social Presence' && $final_score < 4.2)
                        <ul class="text-center">
                            <li>Facilitate social interaction through discussion forums and group projects.</li>
                            <li>Create a friendly and inclusive virtual environment.</li>
                            <li>Encourage sharing of ideas and experiences in online discussions.</li>
                        </ul>
                    @else
                        <ul class="text-center">
                            Ready to Go
                        </ul>
                    @endif
                </div>
            @endforeach
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
