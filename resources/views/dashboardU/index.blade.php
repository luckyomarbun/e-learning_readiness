@extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang</h6>
            </div>
            <div class="card-body">
                <p>Ini merupakan list pertanyaan survey</p>


                <div>
                    <h4>Technological Skills</h3>
                        <div>
                            <h6 class="question">1. Apakah Anda merasa percaya diri dalam menggunakan perangkat teknologi seperti komputer, laptop, atau smartphone?</h6>
                            <input type="radio" name="TechnologicalSkill1" id="1">
                            <label for="1">Sangat Kurang sesuai</label>
                            <input type="radio" name="TechnologicalSkill1" id="2">
                            <label for="2">Kurang sesuai</label>
                            <input type="radio" name="TechnologicalSkill1" id="3">
                            <label for="3">Netral</label>
                            <input type="radio" name="TechnologicalSkill1" id="4">
                            <label for="4">Sesuai</label>
                            <input type="radio" name="TechnologicalSkill1" id="5">
                            <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">2. Apakah Anda memiliki pengalaman sebelumnya dalam menggunakan aplikasi dan alat-alat e-learning?</h6>
                            <input type="radio" name="TechnologicalSkill2" id="1">
                            <label for="1">Sangat Kurang sesuai</label>
                            <input type="radio" name="TechnologicalSkill2" id="2">
                            <label for="2">Kurang sesuai</label>
                            <input type="radio" name="TechnologicalSkill2" id="3">
                            <label for="3">Netral</label>
                            <input type="radio" name="TechnologicalSkill2" id="4">
                            <label for="4">Sesuai</label>
                            <input type="radio" name="TechnologicalSkill2" id="5">
                            <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">3. Apakah Anda memiliki keterampilan dalam mengelola dan menyimpan file digital?</h6>
                            <input type="radio" id="1">
                            <label for="1">Sangat Kurang sesuai</label>
                            <input type="radio" id="2">
                            <label for="2">Kurang sesuai</label>
                            <input type="radio" id="3">
                            <label for="3">Netral</label>
                            <input type="radio" id="4">
                            <label for="4">Sesuai</label>
                            <input type="radio" id="5">
                            <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">4. Apakah Anda memiliki pemahaman dasar tentang penggunaan internet dan navigasi web?</h6>
                            <input type="radio" id="1">
                            <label for="1">Sangat Kurang sesuai</label>
                            <input type="radio" id="2">
                            <label for="2">Kurang sesuai</label>
                            <input type="radio" id="3">
                            <label for="3">Netral</label>
                            <input type="radio" id="4">
                            <label for="4">Sesuai</label>
                            <input type="radio" id="5">
                            <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">5. Apakah Anda terbiasa menggunakan alat-alat kolaborasi online seperti video conference dan grup diskusi?</h6>
                            <input type="radio" id="1">
                            <label for="1">Sangat Kurang sesuai</label>
                            <input type="radio" id="2">
                            <label for="2">Kurang sesuai</label>
                            <input type="radio" id="3">
                            <label for="3">Netral</label>
                            <input type="radio" id="4">
                            <label for="4">Sesuai</label>
                            <input type="radio" id="5">
                            <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">6. Apakah Anda memiliki keterampilan dasar dalam memecahkan masalah teknis yang mungkin timbul selama e-learning?</h6>
                            <input type="radio" id="1">
                            <label for="1">Sangat Kurang sesuai</label>
                            <input type="radio" id="2">
                            <label for="2">Kurang sesuai</label>
                            <input type="radio" id="3">
                            <label for="3">Netral</label>
                            <input type="radio" id="4">
                            <label for="4">Sesuai</label>
                            <input type="radio" id="5">
                            <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">7. Apakah Anda dapat mengelola dan menggunakan alat multimedia seperti audio, video, atau presentasi dalam konteks pembelajaran?</h6>
                            <input type="radio" id="1">
                            <label for="1">Sangat Kurang sesuai</label>
                            <input type="radio" id="2">
                            <label for="2">Kurang sesuai</label>
                            <input type="radio" id="3">
                            <label for="3">Netral</label>
                            <input type="radio" id="4">
                            <label for="4">Sesuai</label>
                            <input type="radio" id="5">
                            <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">8. Apakah Anda terbiasa menggunakan alat-alat e-learning yang digunakan oleh lembaga Anda?</h6>
                            <input type="radio" id="1">
                            <label for="1">Sangat Kurang sesuai</label>
                            <input type="radio" id="2">
                            <label for="2">Kurang sesuai</label>
                            <input type="radio" id="3">
                            <label for="3">Netral</label>
                            <input type="radio" id="4">
                            <label for="4">Sesuai</label>
                            <input type="radio" id="5">
                            <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">9. Apakah Anda memiliki keterampilan dalam menggunakan alat-alat dasar seperti pengolah kata, spreadsheet, dan presentasi?</h6>
                            <input type="radio" id="1">
                            <label for="1">Sangat Kurang sesuai</label>
                            <input type="radio" id="2">
                            <label for="2">Kurang sesuai</label>
                            <input type="radio" id="3">
                            <label for="3">Netral</label>
                            <input type="radio" id="4">
                            <label for="4">Sesuai</label>
                            <input type="radio" id="5">
                            <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>

                        <div>
                            <h6 class="question" 10. Apakah Anda memiliki pemahaman dasar tentang keamanan digital dan privasi online?</h6>
                                <input type="radio" id="1">
                                <label for="1">Sangat Kurang sesuai</label>
                                <input type="radio" id="2">
                                <label for="2">Kurang sesuai</label>
                                <input type="radio" id="3">
                                <label for="3">Netral</label>
                                <input type="radio" id="4">
                                <label for="4">Sesuai</label>
                                <input type="radio" id="5">
                                <label for="5">Sangat Sesuai</label>
                        </div>
                        <br>


                        <a href="#" class="previous">&laquo; Previous</a>
                        <a href="#" class="next">Next &raquo;</a>
                </div>
                <!-- <div>
                    <h4>A</h3>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                </div>
                <div>
                    <h4>A</h3>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                </div>
                <div>
                    <h4>A</h3>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                </div>
                <div>
                    <h4>A</h3>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                        <h6></h6>
                </div> -->


            </div>

        </div>
    </div>
</div>
@endsection