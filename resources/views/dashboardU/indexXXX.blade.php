@extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang</h6>
            </div>
            <div class="card-body">
                <!-- <p>Ini merupakan list pertanyaan survey</p> -->

                <div>
                    <p>
                        Untuk mengetahui kesiapan Anda dalam penerapan pembelajaran online, Anda diharuskan mengisi beberapa pertanyaan di bawah. Terdapat 5 kategori pertanyaan, Jawab setiap pertanyaan yang ada secara jujur dan sesuai kemampuan kalian.

                        (Nilai 1 = sangat tidak setuju; Nilai 2 = tidak setuju; Nilai 3 = netral; Nilai 4 = setuju; Nilai 5 = sangat setuju)
                        *Disclaimer: Seluruh informasi data yang diberikan akan dirahasiakan dan hanya digunakan untuk kepentingan penelitian.
                    </p>
                </div>

                <!-- style for radio button -->
                <!-- <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                    <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                        <input type="radio" name="option" value="option1">
                        Sangat Tidak Setuju
                    </label>
                    <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                        <input type="radio" name="option" value="option2">
                        Tidak Setuju
                    </label>
                    <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                        <input type="radio" name="option" value="option3">
                        Netral
                    </label>
                    <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                        <input type="radio" name="option" value="option4">
                        Setuju
                    </label>
                    <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                        <input type="radio" name="option" value="option5">
                        Sangat Setuju
                    </label>
                </div> -->

                @foreach()




                <div>
                    <div style="justify-content: center; align-items: center; text-align: center;">
                        
                        <h4 style="font-size: 30px; font-weight:bold">Technological Skills</h3>
                        <br>
                    </div >
                    <div>
                        
                        <div>
                            <h6 class="question">1. Apakah Anda merasa percaya diri dalam menggunakan perangkat teknologi seperti komputer, laptop, atau smartphone?</h6>
                            <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option1">
                                    Sangat Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option2">
                                    Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option3">
                                    Netral
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option4">
                                    Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option5">
                                    Sangat Setuju
                                </label>
                            </div>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">2. Apakah Anda memiliki pengalaman sebelumnya dalam menggunakan aplikasi dan alat-alat e-learning?</h6>
                            <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option1">
                                    Sangat Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option2">
                                    Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option3">
                                    Netral
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option4">
                                    Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option5">
                                    Sangat Setuju
                                </label>
                            </div>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">3. Apakah Anda memiliki keterampilan dalam mengelola dan menyimpan file digital?</h6>
                            <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option1">
                                    Sangat Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option2">
                                    Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option3">
                                    Netral
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option4">
                                    Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option5">
                                    Sangat Setuju
                                </label>
                            </div>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">4. Apakah Anda memiliki pemahaman dasar tentang penggunaan internet dan navigasi web?</h6>
                            <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option1">
                                    Sangat Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option2">
                                    Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option3">
                                    Netral
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option4">
                                    Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option5">
                                    Sangat Setuju
                                </label>
                            </div>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">5. Apakah Anda terbiasa menggunakan alat-alat kolaborasi online seperti video conference dan grup diskusi?</h6>
                            <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option1">
                                    Sangat Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option2">
                                    Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option3">
                                    Netral
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option4">
                                    Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option5">
                                    Sangat Setuju
                                </label>
                            </div>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">6. Apakah Anda memiliki keterampilan dasar dalam memecahkan masalah teknis yang mungkin timbul selama e-learning?</h6>
                            <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option1">
                                    Sangat Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option2">
                                    Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option3">
                                    Netral
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option4">
                                    Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option5">
                                    Sangat Setuju
                                </label>
                            </div>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">7. Apakah Anda dapat mengelola dan menggunakan alat multimedia seperti audio, video, atau presentasi dalam konteks pembelajaran?</h6>
                            <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option1">
                                    Sangat Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option2">
                                    Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option3">
                                    Netral
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option4">
                                    Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option5">
                                    Sangat Setuju
                                </label>
                            </div>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">8. Apakah Anda terbiasa menggunakan alat-alat e-learning yang digunakan oleh lembaga Anda?</h6>
                            <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option1">
                                    Sangat Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option2">
                                    Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option3">
                                    Netral
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option4">
                                    Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option5">
                                    Sangat Setuju
                                </label>
                            </div>
                        </div>
                        <br>

                        <div>
                            <h6 class="question">9. Apakah Anda memiliki keterampilan dalam menggunakan alat-alat dasar seperti pengolah kata, spreadsheet, dan presentasi?</h6>
                            <div class="radio-group" style="display: flex; align-items:center; justify-content:center ">
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option1">
                                    Sangat Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option2">
                                    Tidak Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option3">
                                    Netral
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option4">
                                    Setuju
                                </label>
                                <label style="display: flex; flex-direction:column; align-items:center;margin-right:40px">
                                    <input type="radio" name="option" value="option5">
                                    Sangat Setuju
                                </label>
                            </div>
                        </div>
                        <br>

                        <!-- <div>
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
                        </div> -->
                        <br>

                        <!-- previous and next button -->
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