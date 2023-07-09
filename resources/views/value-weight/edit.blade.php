@extends('layouts.private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-6 mb-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Nilai Bobot</h6>
            </div>
            <div class="card-body">
                <main class="form-master">
                    <form action="{{ route('value-weight.update', $valueweight->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- Equivalent to... -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" value="{{ $valueweight->id }}" />
                        <div class="form mb-2">
                            <label for="name">Nilai</label>
                            <input type="text" name="value" class="form-control rounded-top  @error('value') is-invalid @enderror" id="value" placeholder="Nilai" required value="{{ old('value', $valueweight->value) }}" disabled>
                            @error('value')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form">
                            <label for="name">Deskripsi</label>
                            <input type="text" name="description" class="form-control rounded-top  @error('description') is-invalid @enderror" id="description" placeholder="Deskripsi" required value="{{ old('description', $valueweight->description) }}">
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col text-right">
                            <a href="/value-weight" class="w-30 btn btn-md btn-danger mt-3">Batal</a>
                            <button class="w-30 btn btn-md btn-primary mt-3" type="submit">Update</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
