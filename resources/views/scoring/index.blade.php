@extends('layouts/public')

@section('container')
<div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Student Information Form</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('survey') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nim">NIM:</label>
                                <input type="text" id="nim" name="nim" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="year">Year:</label>
                                <input type="number" id="year" name="year" class="form-control" min="1" max="5" required>
                            </div>

                            <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

