@extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h1>Alternative Comparison</h1>
            </div>
        </div>
        @foreach($criterias as $criteria)
        <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Alternative Comparison - {{ $criteria->name }}</h6>
            </div>
            <form action="{{ route('alternative-comparison.store') }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="bg-gradient-primary">
                                <tr class="text-white">
                                    <th>First Alternative</th>
                                    <th>Value Weight</th>
                                    <th>Second Alternative</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternativeComparisons as $alternativeComparison)
                                    @if ($alternativeComparison->criterias[0]->id == $criteria->id)
                                        <tr>
                                            <input type="text" name="type" value="update" hidden>
                                            <td><input type="text" name="firstAlternatives[]" value="{{ $alternativeComparison->firstAlternatives->id }}" hidden>{{ $alternativeComparison->firstAlternatives->name }}</td>
                                            <td>
                                                <select class="form-select" name="valueWeights[]">
                                                    <option selected value="{{ $alternativeComparison->valueWeights->id }}">{{ ('(' . ($alternativeComparison->valueWeights->value) . ') ' . ($alternativeComparison->valueWeights->description)) ?? 'Select value weight' }}</option>
                                                    @foreach($valueWeights as $valueWeight)
                                                        <option value="{{ $valueWeight->id }}">{{ '(' . ($valueWeight->value) . ') ' . ($valueWeight->description) }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" name="secondAlternatives[]" value="{{ $alternativeComparison->secondAlternatives->id }}"hidden>{{ $alternativeComparison->secondAlternatives->name }}</td>
                                            <input type="text" name="criteria" value="{{ $alternativeComparison->criterias[0]->id }}" hidden>
                                        </tr>
                                    @else
                                        @break
                                        @for ($x = 0; $x <= (count($alternatives)-2); $x++) 
                                            @for ($y=($x+1); $y <=(count($alternatives)-1); $y++) 
                                                <tr>
                                                    <input type="text" name="type" value="create" hidden>
                                                    <td><input type="text" name="firstAlternatives[]" value="{{ $alternatives[$x]->id }}" hidden>{{ $alternatives[$x]->name }}</td>
                                                    <td>
                                                        <select class="form-select" name="valueWeights[]">
                                                            <option selected>Select value weight</option>
                                                            @foreach($valueWeights as $valueWeight)
                                                                <option value="{{ $valueWeight->id }}">{{ '(' . ($valueWeight->value) . ') ' . ($valueWeight->description) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="secondAlternatives[]" value="{{ $alternatives[$y]->id }}" hidden>{{ $alternatives[$y]->name }}</td>
                                                    <input type="text" name="criteria" value="{{ $criteria->id }}" hidden>
                                                </tr>
                                            @endfor
                                        @endfor
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button class="btn btn-primary btn">
                            <span class="text">Submit</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @endforeach

    </div>
</div>
@endsection