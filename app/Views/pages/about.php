<<?= $this->extend('layout/template'); ?> <?= $this->section('content'); ?> <div class="tentang pt-5">
    <div class="container-fluid text-center">
        <h1>Tentang</h1>
        <div class="container-fluid pt-5">
            <div class="row pb-3">
                <div class="col-md-6">
                    <img src="/img/2.jpg" class="dokter">
                </div>
                <div class="col-md-6 pe-5 pt-2" style="text-align: left;">
                    <h2 class="display-5">Sistem Pakar Diagnosa Penyakit Diabetes</h2>
                    <p class="pe-5">Sidibet merupakan Sistem Pakar Diagnosis Penyakit Diabetes, Sistem pakar ini menggunakan Algoritma K-Nearest. Mendiagnosa penyakit diabetes berdasarkan gejala yang dialami pasien. </p>
                    <p>Diabetes adalah penyakit dimana kadar gula di dalam darah tinggi karena tubuh tidak dapat melepaskan atau menggunakan insulin</p>
                </div>
            </div>
            <div class="container text-center pt-5">
                SIDIBET
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                </svg>
            </div>
        </div>
    </div>
    </div>

    <?= $this->endSection(); ?>