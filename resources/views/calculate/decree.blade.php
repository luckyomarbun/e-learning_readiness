@extends('layouts/private')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="header-report d-flex">
                <div class="row-lg-3">
                    <img src="{{ asset('img/al-fath.png') }}" alt="al-fath" width="150px" height="150px">
                </div>
                <div class="row-lg-6 justify-content-center">
                    <h5>AL-FATH SCHOOL INDONESIA</h5>
                    <h5>SMA-SMP-SD-TK-KB</h5>
                    <h5>CIRENDEU - BUMI SERPONG DAMAI</h5>
                    <h6>Jl. Raya Cirendeu No.24, Pisangan, Kec. Ciputat Timur, Kota Tangerang Selatan,<br> Banten 15419 Telp. (021) 7415419</h6>
                </div>
            </div>

            <hr>

            <div class="title-report text-center">
                <h6>SURAT KEPUTUSAN PENILAIAN PENERIMA BEASISWA TERBAIK</h6>
            </div>

            @if(count($rank) > 0)
                <div class="row-md-4">
                    <div class="mb-4 mt-4">
                                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                                    <thead class="bg-gradient-dark">
                                    <tr class="text-white">
                                        <th class="">Name</th>
                                        <th class="">Result</th>
                                        <th class="">Rank</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rank as $r)
                                        <tr class="{{ $loop->iteration != 1 ? '' : '' }}">
                                            <th>{{$r->alternative->name}}</th>
                                            <th>
                                                @if ($loop->iteration == 1)
                                                    {{$r->value}}
                                                @else
                                                    {{$r->value}}
                                                @endif
                                            </th>
                                            <th>1</th>
                                            @break
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

            <div class="mt-4">
                <p>Demikian surat keputusan penilaian penerimaan beasiswa terbaik, harap digunakan sebagaimana semestinya</p>
            </div>
                <div class="sign-on text-right">
                    <div class="mt-6">
                        <p>................ , ..........................</p>
                    </div>
                    <div class="sign-on-name">
                        <p>(........................................................)</p>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('javascript_content')

    <script>
        function generatePDF() {
            var opt = {
                margin: [0.5, 0, 0, 0],
                filename: 'SuratKeputusan.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'landscape',
                    fontSize: '9'
                },
                pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
            };

            const element = document.getElementById('container-fluid');
            html2pdf().set(opt).from(element).save();
        }
        generatePDF()
    </script>

@endsection
