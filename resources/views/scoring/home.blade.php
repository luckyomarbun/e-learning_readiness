@extends('layouts/public')
@section('styles')
<style>
    .card {
        border: none;
        border-radius: 5px;
    }

    .card-header {
        background-color: #4e73df;
        color: white;
        text-align: center;
        padding: 20px;
        border-radius: 5px 5px 0 0;
    }

    .welcome-title {
        font-size: 24px;
        font-weight: bold;
    }

    .card-body {
        padding: 30px;
    }

    .welcome-message {
        font-size: 18px;
        margin-top: 20px;
        margin-bottom: 0;
    }

    .survey-button {
        margin-top: 30px;
        text-align: center;
    }

    .survey-button button {
        color: white;
        font-weight: bold;
        padding: 15px 30px;
        font-size: 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* .survey-button button:hover {
        background-color: #17a673;
    } */
</style>
@endsection
@section('container')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="welcome-title">Welcome to the E-Learning Readiness Assessment</h5>
            </div>
            <div class="card-body">
                <p class="text-justify">This survey evaluates your readiness to engage in e-learning activities effectively and efficiently. Your responses to the survey will be used to identify areas where you may need additional support or resources to enhance your e-learning experience.</p>
                <p class="text-center welcome-message">Are you ready to take the survey?</p>
                <div class="text-center survey-button">
                    <form action="{{ route('survey') }}" method="GET">
                        <button type="submit" class="btn btn-primary btn-lg">Take Survey</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection