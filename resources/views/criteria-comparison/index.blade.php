@extends('layouts/private')

@section('container')
<div class="row justify-content-center">

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('err'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('err') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-lg-10">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h1>Perbandingan Kriteria</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Perbandingan Kriteria</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-light">
                        <tr>
                            <th colspan="3" class="text-center">Pilih yang lebih penting</th>
                        </tr>
                        <tr>
                            <th>Kriteria Pertama</th>
                            <th>Nilai Bobot</th>
                            <th>Kriteria Kedua</th>
                        </tr>
                    </thead>

                    <form action="{{ route('criteria-comparison.store') }}" method="POST">
                        @csrf
                        <tbody>
                            @php $urut=0; @endphp
                            @if (count($criteriaComparisons) > 0)
                            @foreach($criteriaComparisons as $criteriaComparison)
                            <tr>
                                <input type="text" name="type" value="update" hidden>
                                <input type="text" name="id[]" value="{{ $criteriaComparison->id }}" hidden>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choosen{{$loop->iteration}}" value="1" class="hidden" {{ $criteriaComparison->choosen == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="option1">
                                            <input type="text" name="firstCriteria[]" value="{{ $criteriaComparison->firstCriterias[0]->id }}" hidden>{{ $criteriaComparison->firstCriterias[0]->name }}
                                        </label>
                                    </div>
                                </td>
                                <!-- <td><input type="text" name="firstCriteria[]" value="{{ $criteriaComparison->firstCriterias[0]->id }}" hidden>{{ $criteriaComparison->firstCriterias[0]->name }}</td> -->
                                <td>
                                    <select class="form-select" name="valueWeight[]">
                                        <option value="{{ $criteriaComparison->valueWeights[0]->id }}" selected>{{ ('(' . ($criteriaComparison->valueWeights[0]->value) . ') ' . ($criteriaComparison->valueWeights[0]->description)) ?? 'Select value weight'  }}</option>
                                        @foreach($valueWeights as $valueWeight)
                                        @if (($criteriaComparison->valueWeights[0]->id ?? 9999) != $valueWeight->id)
                                        <option value="{{ $valueWeight->id }}">{{ '(' . ($valueWeight->value) . ') ' . ($valueWeight->description) }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </td>
                                <!-- <td><input type="text" name="secondCriteria[]" value="{{ $criteriaComparison->secondCriterias[0]->id }}" hidden>{{ $criteriaComparison->secondCriterias[0]->name }}</td> -->
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choosen{{$loop->iteration}}" value="2" class="hidden" {{ $criteriaComparison->choosen == 2 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="option1">
                                            <input type="text" name="secondCriteria[]" value="{{ $criteriaComparison->secondCriterias[0]->id }}" hidden>{{ $criteriaComparison->secondCriterias[0]->name }}
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            @for ($x = 0; $x <= (count($criterias)-2); $x++)
                            @for ($y=($x+1); $y <=(count($criterias)-1); $y++)
                            <tr>
                                @php $urut++; @endphp
                                <input type="text" name="type" value="create" hidden>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choosen{{$urut}}" value="1" checked="" class="hidden">
                                        <label class="form-check-label" for="option1">
                                            <input type="text" name="firstCriteria[]" value="{{ $criterias[$x]->id }}" hidden>{{ $criterias[$x]->name }}
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <select class="form-select" name="valueWeight[]">
                                        <option selected>Select value weight</option>
                                        @foreach($valueWeights as $valueWeight)
                                        <option value="{{ $valueWeight->id }}">{{ '(' . ($valueWeight->value) . ') ' . ($valueWeight->description) }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choosen{{$urut}}" value="2" class="hidden">
                                        <label class="form-check-label" for="option1">
                                            <input type="text" name="secondCriteria[]" value="{{ $criterias[$y]->id }}" hidden>{{ $criterias[$y]->name }}
                                        </label>
                                    </div>
                                </td>
                                </tr>

                                @endfor
                                @endfor
                                @endif
                        </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="text-center">
                    <button class="btn btn-primary btn">
                        <span class="text">Simpan</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
