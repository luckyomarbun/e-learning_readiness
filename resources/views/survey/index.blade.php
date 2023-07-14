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
                <h1>Survey E-Learning</h1>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col text-right">
                        
                        <a class="btn btn-primary btn-icon text-right {{ empty($selectedSectionId) ? 'disabled' : '' }}" data-toggle="modal" data-bs-target="#smallButton" data-attr="/survey/create?selectedSectionId={{ $selectedSectionId }}" data-target="#smallModal" id="smallButton">
                            <span class="icon text-white-50-right">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text-right">Tambah Pertanyaan</span>
                        </a>

                    </div>
                    <div class="col text-right">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $selectedSectionId ? $section->where('id', $selectedSectionId)->pluck('value')->first() : 'Please select section' }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach($section as $index => $section)
                                <a class="dropdown-item {{ $section->id == $selectedSectionId ? 'active' : '' }}" href="/survey?sectionId={{ $section->id }}">
                                    {{ $section->value }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="w-auto">No</th>
                                <th class="w-auto">Pertanyaan</th>
                                <th class="w-auto">Waktu Dibuat</th>
                                <!-- <th>Update Terakhir</th> -->
                                <th class="w-auto">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($question as $index => $question)
                            <tr>
                                <th class="w-auto" scope="row">{{ $index+1 }}</th>
                                <td class="w-auto">{{ $question->value; }}</td>
                                <td class="w-auto">{{ $question->created_at; }}</td>
                                <td class="w-auto">
                                    <a class="btn btn-primary btn-circle" data-toggle="modal" data-bs-target="#smallButton" data-attr="/survey/{{$question->id}}/edit" data-target="#smallModal" id="smallButton">
                                        <i class="fas fa-pencil-square-o"></i>
                                    </a>

                                    <a class="btn btn-danger btn-circle" data-toggle="modal" data-bs-target="#smallButton" data-attr="/alternative/delete/{{ $question->id }}" data-target="#smallModal" id="smallButton">
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

<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <a href="/alternative" class="w-30 btn btn-md btn-danger mt-3">Batal</a> -->
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