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
                <h1>Nilai Bobot</h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="/value-weight/create" class="btn btn-primary btn-icon">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Nilai Bobot</span>
                </a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Nilai Bobot</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Waktu Dibuat</th>
                                <th scope="col">Update Terakhir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($valueweights as $index => $valueweight)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $valueweight->value; }}</td>
                                <td>{{ $valueweight->description; }}</td>
                                <td>{{ $valueweight->created_at; }}</td>
                                <td>{{ $valueweight->updated_at; }}</td>
                                <td>
                                    <a href="/value-weight/{{$valueweight->id}}/edit" class="btn btn-primary btn-circle">
                                        <i class="fas fa-pencil-square-o"></i>
                                    </a>

                                    <a class="btn btn-danger btn-circle" data-toggle="modal" data-bs-target="#smallButton"
                                       data-attr="/value-weight/delete/{{ $valueweight->id }}" data-target="#smallModal" id="smallButton">
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
                url: href
                , beforeSend: function() {
                    // $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                }
                , complete: function() {
                    // $('#loader').hide();
                }
                , error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    // $('#loader').hide();
                }
                , timeout: 8000
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
