@extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h1>Criterias</h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="/candidate/create" class="btn btn-primary btn-icon">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add Criteria</span>
                </a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Candidates Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Last Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($criterias as $index => $criteria)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $criteria->name; }}</td>
                                <td>{{ $criteria->created_at; }}</td>
                                <td>{{ $criteria->updated_at; }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-circle">
                                        <i class="fas fa-pencil-square-o"></i>
                                    </a>

                                    <a href="#" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection