@extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h3 class="m-0 font-weight-bold text-primary">Kalkulasi - AHP (Analytical Hierarchy Process)</h3>
            </div>
            <div class="col-lg-6 text-right">
                <a href="/calculate/result/print" target="_blank" class="m-0 btn btn-md btn-primary shadow-sm"><i class="fas fa-print text-white-50"></i> Cetak</a>
            </div>
        </div>
        <hr>
        <div class="row mb-3 mt-5">
            <div class="col-lg-6">
                <h4>Kriteria</h4>
            </div>
        </div>
        @if(count($calculateCriteria)>0)
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Perbandingan Kriteria</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                             <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    @php
                                        for ($x = 0; $x <= count($criterias)-1; $x++) {
                                            echo "<th>".$criterias[$x]->name."</th>";
                                        }
                                    @endphp
                                </tr>
                            </thead>
                            <tbody>
                            @for($x = 0; $x <= count($criterias)-1; $x++)
                                <tr>
                                    <th>{{ $criterias[$x]->name }}</th>
                                    @for ($y=0; $y <= count($criterias)-1; $y++)
                                    <td>{{ round($calculateCriteria['matrik'][$x][$y],5); }}</td>
                                    @endfor
                                </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>Jumlah</th>
                                @php
                                    for ($x = 0; $x <= count($criterias)-1; $x++) {
                                        echo "<th>".round($calculateCriteria['jmlmpb'][$x],5)."</th>";
                                    }
                                @endphp
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4 mt-5">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nilai Matrik Kriteria</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                             <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    @php
                                        for ($x = 0; $x <= count($criterias)-1; $x++) {
                                            echo "<th>".$criterias[$x]->name."</th>";
                                        }
                                    @endphp
                                    <th>Jumlah</th>
                                    <th>Priority Vector</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                for ($x=0; $x <= count($criterias)-1; $x++) {
                                    echo "<tr>";
                                    echo "<td>".$criterias[$x]->name."</td>";
                                        for ($y=0; $y <= count($criterias)-1; $y++) {
                                            echo "<td>".round($calculateCriteria['matrikb'][$x][$y],5)."</td>";
                                        }

                                    echo "<td>".round($calculateCriteria['jmlmnk'][$x],5)."</td>";
                                    echo "<td>".round($calculateCriteria['pv'][$x],5)."</td>";

                                    echo "</tr>";
                                }
                                @endphp
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="<?php echo (count($criterias)+2)?>">Principe Eigen Vector (λ maks)</th>
                                <th><?php echo (round($calculateCriteria['eigenvektor'],5))?></th>
                            </tr>
                            <tr>
                                <th colspan="<?php echo (count($criterias)+2)?>">Consistency Index</th>
                                <th><?php echo (round($calculateCriteria['consIndex'],5))?></th>
                            </tr>
                            <tr>
                                <th colspan="<?php echo (count($criterias)+2)?>">Consistency Ratio</th>
                                <th><?php echo (round(($calculateCriteria['consRatio'] * 100),2))?> %</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            @if(round(($calculateCriteria['consRatio'] * 100),2) > 10)
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                    <h2><i class="fas fa-exclamation-triangle mr-4"></i></h2>
                    <div class="">
                        <h5><b>Consistency Ratio exceeds 10% !!!</b></h5>
                        <span>Please re-submit the comparison table...</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        @else
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                <h2><i class="fas fa-exclamation-triangle mr-4"></i></h2>
                <div class="">
                    <h5><b>Criteria Comparison table not complete submitted</b></h5>
                    <span>Please submit criteria comparison table...</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- below is alternative comparison calculate -->

        <hr>
        <div class="row mb-2 mt-5">
            <div class="col-lg-6">
                <h4>Alternatif</h4>
            </div>
        </div>

        @if (count($calculateAlternatives) > 0)
            @for($i = 0; $i <= count($calculateAlternatives)-1; $i++)
                <div class="card shadow mb-4 mt-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Perbandingan Alternatif - {{ $criterias[$calculateAlternatives[$i]['criteriaId']]->name }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                                 <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        @php
                                            for ($x = 0; $x <= count($alternatives)-1; $x++) {
                                                echo "<th>".$alternatives[$x]->name."</th>";
                                            }
                                        @endphp
                                    </tr>
                                </thead>
                                <tbody>
                                @for($x = 0; $x <= count($alternatives)-1; $x++)
                                    <tr>
                                        <th>{{ $alternatives[$x]->name }}</th>
                                        @for ($y=0; $y <= count($alternatives)-1; $y++)
                                        <td>{{ round($calculateAlternatives[$i]['matrik'][$x][$y],5); }}</td>
                                        @endfor
                                    </tr>
                                    @endfor
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Jumlah</th>
                                    @php
                                        for ($x = 0; $x <= count($alternatives)-1; $x++) {
                                            echo "<th>".round($calculateAlternatives[$i]['jmlmpb'][$x],5)."</th>";
                                        }
                                    @endphp
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4 mt-5">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Nilai Matriks Alternatif - {{ $criterias[$calculateAlternatives[$i]['criteriaId']]->name }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                                 <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        @php
                                            for ($x = 0; $x <= count($alternatives)-1; $x++) {
                                                echo "<th>".$alternatives[$x]->name."</th>";
                                            }
                                        @endphp
                                        <th>Jumlah</th>
                                        <th>Priority Vector</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    for ($x=0; $x <= count($alternatives)-1; $x++) {
                                        echo "<tr>";
                                        echo "<td>".$alternatives[$x]->name."</td>";
                                            for ($y=0; $y <= count($alternatives)-1; $y++) {
                                                echo "<td>".round($calculateAlternatives[$i]['matrikb'][$x][$y],5)."</td>";
                                            }

                                        echo "<td>".round($calculateAlternatives[$i]['jmlmnk'][$x],5)."</td>";
                                        echo "<td>".round($calculateAlternatives[$i]['pv'][$x],5)."</td>";

                                        echo "</tr>";
                                    }
                                    @endphp
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="<?php echo (count($alternatives)+2)?>">Principe Eigen Vector (λ maks)</th>
                                    <th><?php echo (round($calculateAlternatives[$i]['eigenvektor'],5))?></th>
                                </tr>
                                <tr>
                                    <th colspan="<?php echo (count($alternatives)+2)?>">Consistency Index</th>
                                    <th><?php echo (round($calculateAlternatives[$i]['consIndex'],5))?></th>
                                </tr>
                                <tr>
                                    <th colspan="<?php echo (count($alternatives)+2)?>">Consistency Ratio</th>
                                    <th><?php echo (round(($calculateAlternatives[$i]['consRatio'] * 100),2))?> %</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                @if(round(($calculateAlternatives[$i]['consRatio'] * 100),2) > 10)
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                        <h2><i class="fas fa-exclamation-triangle mr-4"></i></h2>
                        <div class="">
                            <h5><b>Consistency Ratio exceeds 10% !!!</b></h5>
                            <span>Please re-submit the comparison table...</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endfor
        @else
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                <h2><i class="fas fa-exclamation-triangle mr-4"></i></h2>
                <div class="">
                    <h5><b>Alternative Comparison table not complete submitted</b></h5>
                    <span>Please submit alternative comparison table...</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!--RESULT CALCULATION-->
        <hr>
        <div class="row mb-2 mt-5">
            <div class="col-lg-6">
                <h4>Result</h4>
            </div>
        </div>

        @if ((count($criterias)==$distinctPvAlternative) && (count($criterias)==$distinctPvCriteria))
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hasil Kalkulasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                                <th>Overall Composite Height</th>
                                <th>Priority Vector (Average)</th>
                                @php
                                    for($i=0; $i <= count($alternatives)-1; $i++) {
                                        echo "<th>".$alternatives[$i]->name."</th>\n";
                                    }
                                @endphp
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $x = 0;
                                for($i=0; $i <= count($criterias)-1; $i++) {
                                    echo "<tr>";
                                    echo "<td>".$criterias[$i]->name."</td>";
                                    echo "<td>".$resultCriteriaPv[$i]."</td>";
                                    for ($y=0; $y <= count($alternatives)-1; $y++) {
                                        echo "<td>".$resultAlternativePv[$x]."</td>";
                                        $x++;
                                    }
                                    echo "</tr>";
                                }
                            @endphp
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                @php
                                    for($i=0; $i <= count($alternatives)-1; $i++) {
                                        echo "<th>".round($valueResult[$i],5) ."</th>";
                                    }
                                @endphp
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                <h2><i class="fas fa-exclamation-triangle mr-4"></i></h2>
                <div class="">
                    <h5><b>Comparison table not complete submitted</b></h5>
                    <span>Please submit all comparison table...</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <!-- RANKING SECTION -->
        <hr>
        <div class="row mb-2 mt-5">
            <div class="col-lg-6">
                <h4>Peringkat</h4>
            </div>
            <div class="col-lg-6 text-right">
                <a href="result/print/decree" target="_blank" class="btn btn-md btn-primary" type="submit">Unduh</a>
            </div>
        </div>

        @if(count($rank) > 0)
        <div class="row-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Peringkat</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                            <thead class="bg-gradient-primary">
                                <tr class="text-white">
                                    <th class="">Peringkat</th>
                                    <th class="">Alternatif</th>
                                    <th class="">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rank as $r)
                                <tr class="{{ $loop->iteration != 1 ? '' : '' }}">
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{$r->alternative->name}}</th>
                                    <th>
                                        @if ($loop->iteration == 1)
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    {{$r->value}}
                                                </div>
                                                <div class="col-sm-10 text-right">
                                                    <h5><span class="badge bg-primary">Terbaik! &#128077;</span></h5>
                                                </div>
                                            </div>

                                        @else
                                            {{$r->value}}
                                        @endif
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                <h2><i class="fas fa-exclamation-triangle mr-4"></i></h2>
                <div class="">
                    <h5><b>Comparison table not complete submitted</b></h5>
                    <span>Please submit all comparison table...</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endIf

    </div>
</div>
@endsection
