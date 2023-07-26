@extends('layouts/public')
@section('styles')
    <style>
        .score-card {
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

        .score-description {
            color: #5a5c69;
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
    </style>
@endsection
@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Welcome to E-Learning Readiness</h6>
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

    <div class="row">
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4 score-card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-center">Your Score</h6>
                    </div>
                    <div class="card-body">
                        <div class="score-value">{{ session('final_score') }}</div>
                        <div class="score-description">Thank You 😄</div>
                        <!-- <div class="score-icon"><i class="bi bi-emoji-smile"></i></div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4 score-card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-center">Description</h6>
                    </div>
                    <div class="card-body">
                        @foreach (session('sections') as $section)
                            <div>
                                <strong>{{ $section['name'] }}:</strong> {{ $section['score'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Back to Survey button -->
            <div class="row justify-content-center mt-3">
                <div class="col-lg-10">
                    <a href="{{ route('survey') }}" class="btn btn-primary">Back to Survey</a>
                </div>
            </div>
        </div>
    @endsection
