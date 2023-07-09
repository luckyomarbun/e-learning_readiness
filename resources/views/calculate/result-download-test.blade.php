<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scheduler Acceptance - Report</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: left;
            padding: 8px;
        }

        .container {
            margin: 100px;
        }

        .header-report {
            font-family: Arial, Helvetica, sans-serif;
            color: #4E73DF;
            display: flex;
            align-items: center;
        }

        .header-report h4 {
            color: #000000;
        }

        .title-report {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .content {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>

</head>

<body>

<div class="container">
    <div class="header-report">
        <div>
            <img src="{{ asset('img/al-fath.png') }}" alt="al-fath" width="150px" height="150px">
        </div>
        <div>
            <h2>AL-FATH SCHOOL INDONESIA <br>SMA-SMP-SD-TK-KB <br>CIRENDEU - BUMI SERPONG DAMAI</h2>
            <h4>Jl. Raya Cirendeu No.24, Pisangan, Kec. Ciputat Timur, Kota Tangerang Selatan,<br> Banten 15419 Telp. (021) 7415419</h4>
        </div>
    </div>

    <hr style="border: 1px solid black">

    <div class="title-report">
        <h3>LAPORAN HASIL SISTEM PENUNJANG KEPUTUSAN PENERIMAAN BEASISWA</h3>
    </div>

    <div class="content">

        <h3>Critera</h3>
        <h4>Criteria Comparison</h4>
        <table style="margin-bottom: 50px">
            <thead>
            <tr>
                <td>Criteria</td>
                @php
                    for ($x = 0; $x <= count($criterias)-1; $x++) { echo "<td>"
                        .$criterias[$x]->name."</td>";
                        }
                @endphp
            </tr>
            </thead>
            <tbody>
            @for($x = 0; $x <= count($criterias)-1; $x++) <tr>
                <td>{{ $criterias[$x]->name }}</td>
                @for ($y=0; $y <= count($criterias)-1; $y++) <td>{{
                                                        round($calculateCriteria['matrik'][$x][$y],5); }}</td>
                @endfor
            </tr>
            @endfor
            </tbody>
            <tfoot>
            <tr>
                <td>Jumlah</td>
                @php
                    for ($x = 0; $x <= count($criterias)-1; $x++) { echo "<td>"
                        .round($calculateCriteria['jmlmpb'][$x],5)."</td>";
                        }
                @endphp
            </tr>
            </tfoot>
        </table>

        <hr>
        <h3 style="margin-top: 50px">Alternative</h3>
        @for($i = 0; $i <= count($calculateAlternatives)-1; $i++)
            <h4>Alternative Comparison - {{ $criterias[$calculateAlternatives[$i]['criteriaId']]->name }}</h4>
                <table>
                    <thead>
                        <tr>
                            <td>Alternative</td>
                            @php
                                for ($x = 0; $x <= count($alternatives)-1; $x++) { echo "<td>"
                                    .$alternatives[$x]->name."</td>";
                                    }
                            @endphp
                        </tr>
                    </thead>
                    <tbody>
                        @for($x = 0; $x <= count($alternatives)-1; $x++)
                            <tr>
                                <td>{{ $alternatives[$x]->name }}</td>
                                @for ($y=0; $y <= count($alternatives)-1; $y++)
                                    <td>{{ round($calculateAlternatives[$i]['matrik'][$x][$y],5); }}</td>
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Jumlah</td>
                            @php
                                for ($x = 0; $x <= count($alternatives)-1; $x++) { echo "<td>"
                                    .round($calculateAlternatives[$i]['jmlmpb'][$x],5)."</td>";
                                    }
                            @endphp
                        </tr>
                    </tfoot>
                </table>
        @endfor

        <hr style="margin-top: 50px; margin-bottom: 50px">
        <h3>Result</h3>
        <h4>Calculation Result</h4>
            <table>
                <thead>
                    <tr>
                        <th>Overall Composite Height</th>
                        <th>Priority Vector (Average)</th>
                            @php
                                for($i=0; $i <= count($alternatives)-1; $i++) { echo "<th>"
                                    .$alternatives[$i]->name."</th>\n";
                                    }
                            @endphp
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 0;
                        for($i=0; $i <= count($criterias)-1; $i++) { echo "<tr>" ; echo "<td>"
                               .$criterias[$i]->name."</td>";
                            echo "<td>".$resultCriteriaPv[$i]."</td>";
                            for ($y=0; $y <= count($alternatives)-1; $y++) { echo "<td>"
                                   .$resultAlternativePv[$x]."</td>";
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
                                for($i=0; $i <= count($alternatives)-1; $i++) { echo "<th>"
                                    .round($valueResult[$i],5) ."</th>";
                                    }
                            @endphp
                        </tr>
                </tfoot>
            </table>

        <!-- RANKING SECTION -->
        <hr style="margin-top: 50px">
        <h3>Ranking</h3>
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead class="bg-gradient-primary">
                    <tr class="text-white">
                        <th class="">Rank</th>
                        <th class="">Alternative</th>
                        <th class="">Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rank as $r)
                        <tr class="{{ $loop->iteration != 1 ? '' : '' }}">
                            <th>{{ $loop->iteration }}</th>
                            <th>{{$r->alternative->name}}</th>
                            <th>{{$r->value}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>

</body>

</html>
