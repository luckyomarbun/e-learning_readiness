@extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h1>Perbandingan Alternatif</h1>
            </div>
        </div>
        <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Perbandingan Alternatif - {{ $selectedCriteria->name }}</h6>
            </div>
            <form action="{{ route('alternative-comparison.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="bg-gradient-primary">
                                <tr>
                                    <th colspan="3" class="text-center text-white">Pilih yang lebih penting</th>
                                </tr>
                                <tr class="text-white">
                                    <th class="text-center">Alternatif Pertama</th>
                                    <th class="text-center">Nilai Bobot</th>
                                    <th class="text-center">Alternatif Kedua</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $urut=0; @endphp
                                @if (count($alternativeComparisons) > 0)
                                    @foreach($alternativeComparisons as $alternativeComparison)
                                        <tr>
                                            <input type="text" name="type" value="update" hidden>
                                            <input type="text" name="id[]" value="{{ $alternativeComparison->id }}" hidden>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="choosen{{$loop->iteration}}" value="1" class="hidden" {{ $alternativeComparison->choosen == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="option1">
                                                        <input type="text" name="firstAlternatives[]" value="{{ $alternativeComparison->firstAlternatives->id }}" hidden>{{ $alternativeComparison->firstAlternatives->name }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <select class="form-select" name="valueWeights[]">
                                                    <option selected value="{{ $alternativeComparison->valueWeights->id }}">{{ ('(' . ($alternativeComparison->valueWeights->value) . ') ' . ($alternativeComparison->valueWeights->description)) ?? 'Select value weight' }}</option>
                                                    @foreach($valueWeights as $valueWeight)
                                                    <option value="{{ $valueWeight->id }}">{{ '(' . ($valueWeight->value) . ') ' . ($valueWeight->description) }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="choosen{{$loop->iteration}}" value="2" class="hidden" {{ $alternativeComparison->choosen == 2 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="option1">
                                                        <input type="text" name="secondAlternatives[]" value="{{ $alternativeComparison->secondAlternatives->id }}" hidden>{{ $alternativeComparison->secondAlternatives->name }}
                                                    </label>
                                                </div>
                                            </td>
                                            <input type="text" name="criteria" value="{{ $alternativeComparison->criterias[0]->id }}" hidden>
                                        </tr>
                                    @endforeach
                                @else
                                    @for ($x = 0; $x <= (count($alternatives)-2); $x++)
                                        @for ($y=($x+1); $y <=(count($alternatives)-1); $y++)
                                            @php $urut++; @endphp
                                            <tr>
                                                <input type="text" name="type" value="create" hidden>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="choosen{{$urut}}" value="1" checked="" class="hidden">
                                                        <label class="form-check-label" for="option1">
                                                            <input type="text" name="firstAlternatives[]" value="{{ $alternatives[$x]->id }}" hidden>{{ $alternatives[$x]->name }}
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select class="form-select" name="valueWeights[]">
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
                                                            <input type="text" name="secondAlternatives[]" value="{{ $alternatives[$y]->id }}" hidden>{{ $alternatives[$y]->name }}
                                                        </label>
                                                    </div>
                                                </td>
                                                <input type="text" name="criteria" value="{{$criterias}}" hidden>
                                            </tr>
                                        @endfor
                                    @endfor
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a class="btn btn-outline-danger" href="/calculate/alternative-comparison">
                            <span class="text">Kembali</span>
                        </a>
                        <button class="btn btn-primary btn">
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
