@extends('layouts/public')
@section('styles')
<style>
    .score-card {
        background-color: #f8f9fc;
        border: 1px solid #d1d3e2;
        border-radius: 5px;
        padding: 20px;

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
<div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card mt-5 score-card">
                    <div class="card-header">
                        <h3 class="text-center">Student Information Form</h3>
                    </div>
                    <div class="card-body">
                        <form name ="anas" method="post" action="{{ route('survey.form') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" pattern=".+@student\telkomuniversity\.ac\.id$" required>
                                <small class="form-text text-muted">Email must end with @student.telkomuniversity.ac.id</small>
                            </div>

                            <div class="form-group">
                                <label for="year">Entry Year:</label>
                                <input type="number" id="year" name="year" class="form-control" min="2016" required>
                                <small class="form-text text-muted">Year of admission must be after 2016</small>
                            </div>

                            <div class="form-group">
                                <label for="nim">Student Number (NIM):</label>
                                <input type="text" id="nim" name="nim" class="form-control" pattern="[0-9]{10}" required>
                                <small class="form-text text-muted">Student Number (NIM) must consist of exactly 10 digits</small>
                            </div>
                            <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">next</button>
                            </div>
                            <input type="hidden" id="form_user" name="form_user" value="user">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

