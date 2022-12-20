<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid pt-5">
    <div class="row  info">
        <div class="diabetes col-6 text-center">
            <h1>
                <b> Apa itu diabetes?</b>
            </h1>
            <h5 class="pt-3">Diabetes atau biasa disebut penyakit gula adalah penyakit dimana kadar gula di dalam darah tidak normal (tinggi) karena tubuh tidak dapat melepaskan atau menggunakan insulin. Insulin dihasilkan oleh kelenjar pancreas, jika terjadi gangguan pada kerja insulin baik secara kualitas dan kuantitas maka keseimbangan glukosa darah akan terganggu dan kadar glukosa akan cenderung naik.
            </h5>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile-fill text-light" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z" />
                </svg>
            </p>
        </div>
        <div class="col-6 gambar">

        </div>
    </div>
    <div class="row factor">
        <div class="col-6 faktor">

        </div>
        <div class="diabetes col-6 mt-5 mb-5">
            <h1>Faktor Penyebab.</h1>
            <ul class="list-unstyled mt-3">
                <ul>
                    <li>Usia (Rata-rata diatas 50 tahun)</li>
                    <li>Obesitas</li>
                    <li>Riwayat keluarga</li>
                    <li>Gaya hidup</li>
                    <li>Pola makan</li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="row kompilasi">
        <div class="tkomp col-6 text-center">
            <h2 class="display-1">Komplikasi</h2>
            <h3 class="display-1">Diabetes?</h3>
        </div>
        <div class="col-6 gkomp">

        </div>
    </div>
</div>
<?= $this->endSection(); ?>