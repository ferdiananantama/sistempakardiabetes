<?php

namespace App\Controllers;

use App\Models\KonsultasiModel;

class konsultasi extends BaseController
{
    public function __construct()
    {
        $this->konsultasiModel = new KonsultasiModel();
    }
    public function index()
    {
        $data = $this->konsultasiModel->data();
        $diagnosa = $this->konsultasiModel->last_diagnosa();
        $last = (int)$diagnosa + 1;
        $data = array(
            'title' => 'konsultasi',
            'data' => $data,
            'last' => $last
        );

        echo view('v_konsultasi', $data);
    }

    public function diagnosa()
    {
        $id_diagnosa = $this->request->getVar('id_diagnosa');
        $nama_pasien = $this->request->getVar('nama_pasien');
        $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        $usia = $this->request->getVar('usia');
        $t1 = $this->request->getVar('1');
        $t2 = $this->request->getVar('2');
        $t3 = $this->request->getVar('3');
        $t4 = $this->request->getVar('4');
        $t5 = $this->request->getVar('5');
        $t6 = $this->request->getVar('6');
        $t7 = $this->request->getVar('7');
        $t8 = $this->request->getVar('8');
        $t9 = $this->request->getVar('9');
        $t10 = $this->request->getVar('10');
        $t11 = $this->request->getVar('11');
        $t12 = $this->request->getVar('12');
        $t13 = $this->request->getVar('13');
        $t14 = $this->request->getVar('14');
        $t15 = $this->request->getVar('15');
        $t16 = $this->request->getVar('16');
        $t17 = $this->request->getVar('17');
        $t18 = $this->request->getVar('18');
        $t19 = $this->request->getVar('19');
        $t20 = $this->request->getVar('20');
        $t21 = $this->request->getVar('21');

        $diagnosa = $this->konsultasiModel->last_diagnosa();
        $row = (int)$diagnosa;

        //Kalkulasi
        for ($i = 1; $i <= $row; $i++) {
            $get = $this->konsultasiModel->getrow($i);

            foreach ($get as $num) {
                $id_penyakit = $num['id_penyakit'];
                $p1 = (int)$num['G1'];
                $p2 = (int)$num['G2'];
                $p3 = (int)$num['G3'];
                $p4 = (int)$num['G4'];
                $p5 = (int)$num['G5'];
                $p6 = (int)$num['G6'];
                $p7 = (int)$num['G7'];
                $p8 = (int)$num['G8'];
                $p9 = (int)$num['G9'];
                $p10 = (int)$num['G10'];
                $p11 = (int)$num['G11'];
                $p12 = (int)$num['G12'];
                $p13 = (int)$num['G13'];
                $p14 = (int)$num['G14'];
                $p15 = (int)$num['G15'];
                $p16 = (int)$num['G16'];
                $p17 = (int)$num['G17'];
                $p18 = (int)$num['G18'];
                $p19 = (int)$num['G19'];
                $p20 = (int)$num['G20'];
                $p21 = (int)$num['G21'];
            }

            $calc = (($t1 - $p1) * ($t1 - $p1)) + (($t2 - $p2) * ($t2 - $p2)) + (($t3 - $p3) * ($t3 - $p3)) +
                (($t4 - $p4) * ($t4 - $p4)) + (($t5 - $p5) * ($t5 - $p5)) + (($t6 - $p6) * ($t6 - $p6)) +
                (($t7 - $p7) * ($t7 - $p7)) + (($t8 - $p8) * ($t8 - $p8)) + (($t9 - $p9) * ($t9 - $p9)) +
                (($t10 - $p10) * ($t10 - $p10)) + (($t11 - $p11) * ($t11 - $p11)) + (($t12 - $p12) * ($t12 - $p12)) +
                (($t13 - $p13) * ($t13 - $p13)) + (($t14 - $p14) * ($t14 - $p14)) + (($t15 - $p15) * ($t15 - $p15)) +
                (($t16 - $p16) * ($t16 - $p16)) + (($t17 - $p17) * ($t17 - $p17)) + (($t18 - $p18) * ($t18 - $p18)) +
                (($t19 - $p19) * ($t19 - $p19)) + (($t20 - $p20) * ($t20 - $p20)) + (($t21 - $p21) * ($t21 - $p21));
            $result = sqrt($calc);

            $data = array(
                'id_penyakit' => $id_penyakit,
                'result' => $result
            );
            $data = $this->konsultasiModel->insertcalc($data);
        }
        //Perhitungan berdasarkan nilai K (5)
        $gettemp = $this->konsultasiModel->gettempdata();
        foreach ($gettemp as $last) {
            $giv = array(
                'id_penyakit' => $last['id_penyakit'],
                'result' => $last['result']
            );
            $giv = $this->konsultasiModel->givtempdata($giv);
        }
        for ($p = 1; $p <= 4; $p++) {
            $count = $this->konsultasiModel->countpenyakit($p);

            $a = (int)$count;
            $store = array(
                'nilai' => $a
            );
            $where = array(
                'id_penyakit' => $p
            );
            $store = $this->konsultasiModel->updatevalue($store, $where);
        }
        //Pemilihan
        $b = $this->konsultasiModel->choosepenyakit();
        $b = (int)$b;

        //Finishing
        $masuk = array(
            'id_diagnosa' => $id_diagnosa,
            'nama_pasien' => $nama_pasien,
            'jenis_kelamin' => $jenis_kelamin,
            'usia' => $usia,
            'id_penyakit' => $b,
            'G1' => $t1,
            'G2' => $t2,
            'G3' => $t3,
            'G4' => $t4,
            'G5' => $t5,
            'G6' => $t6,
            'G7' => $t7,
            'G8' => $t8,
            'G9' => $t9,
            'G10' => $t10,
            'G11' => $t11,
            'G12' => $t12,
            'G13' => $t13,
            'G14' => $t14,
            'G15' => $t15,
            'G16' => $t16,
            'G17' => $t17,
            'G18' => $t18,
            'G19' => $t19,
            'G20' => $t20,
            'G21' => $t21
        );

        $masuk = $this->konsultasiModel->insertpenyakit($masuk);
        $hapuscalc = $this->konsultasiModel->removecalc();
        $gantivalue = $this->konsultasiModel->zerovalue();
        $kosongkval = $this->konsultasiModel->blankkval();

        $ambil = $this->konsultasiModel->retrievepenyakit($id_diagnosa);
        $file = array(
            'ambil' => $ambil
        );
        echo view('hasil_diagnosa', $file);
    }
}
