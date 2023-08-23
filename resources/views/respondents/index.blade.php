@extends('layouts/private')

@section('container')
<div class="row justify-content-center">

    @if(session()->has('success') && session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('err') && session()->get('err'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('err') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="col-lg-10">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h1>Respondents</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Table Data for Respondents</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable-user" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Student ID Number</th>
                                <th scope="col">Submission Time</th>
                                <th scope="col">TS</th>
                                <th scope="col">SHS</th>
                                <th scope="col">CP</th>
                                <th scope="col">TP</th>
                                <th scope="col">SP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $index => $data)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $data->full_name; }}</td>
                                <td>{{ $data->student_id_number; }}</td>
                                <td>{{ $data->survey_taken_date; }}</td>
                                <td>{{ $data->section1; }}</td>
                                <td>{{ $data->section2; }}</td>
                                <td>{{ $data->section3; }}</td>
                                <td>{{ $data->section4; }}</td>
                                <td>{{ $data->section5; }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript_content')
<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        console.log('ini bro', href);
        $.ajax({
            url: href,
            beforeSend: function() {
                // $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            },
            complete: function() {
                // $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                // $('#loader').hide();
            },
            timeout: 8000
        })
    });
</script>

<script>
    // display a modal (small modal)
    $(document).on('click', '#cancelButton', function(event) {
        event.preventDefault();
        $('#smallModal').modal("hide");
        $('#smallBody').html(result).hide();
    });
</script>
@endsection