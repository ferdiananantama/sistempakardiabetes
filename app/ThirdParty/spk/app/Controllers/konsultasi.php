<?php

namespace App\Controllers;

use App\Models\DiagnosaModel;

class konsultasi extends BaseController
{

    public function index()
    {
        $data = $this->m_konsultasi->data();
        $diagnosa = $this->m_konsultasi->last_diagnosa();
        $last = (int)$diagnosa + 1;
        $data = array(
            'title' => 'Konsultasi',
            'data' => $data,
            'last' => $last
        );
        $this->load->view('v_konsultasi', $data);
    }

    public function diagnosa()
    {
        $id_diagnosa = $this->input->post('id_diagnosa');
        $nm_pasien = $this->input->post('nm_pasien');
        $jns_kelamin = $this->input->post('jns_kelamin');
        $usia = $this->input->post('usia');
        $t1 = $this->input->post('1');
        $t2 = $this->input->post('2');
        $t3 = $this->input->post('3');
        $t4 = $this->input->post('4');
        $t5 = $this->input->post('5');
        $t6 = $this->input->post('6');
        $t7 = $this->input->post('7');
        $t8 = $this->input->post('8');
        $t9 = $this->input->post('9');
        $t10 = $this->input->post('10');
        $t11 = $this->input->post('11');
        $t12 = $this->input->post('12');
        $t13 = $this->input->post('13');
        $t14 = $this->input->post('14');
        $t15 = $this->input->post('15');
        $t16 = $this->input->post('16');
        $t17 = $this->input->post('17');
        $t18 = $this->input->post('18');
        $t19 = $this->input->post('19');
        $t20 = $this->input->post('20');
        $t21 = $this->input->post('21');
        $t22 = $this->input->post('22');
        $t23 = $this->input->post('23');
        $t24 = $this->input->post('24');
        $t25 = $this->input->post('25');
        $t26 = $this->input->post('26');
        $t27 = $this->input->post('27');
        $t28 = $this->input->post('28');
        $t29 = $this->input->post('29');
        $t30 = $this->input->post('30');

        $diagnosa = $this->m_konsultasi->last_diagnosa();
        $row = (int)$diagnosa;

        //Kalkulasi
        for ($i = 1; $i <= $row; $i++) {
            $get = $this->m_konsultasi->getrow($i);

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
            $data = $this->m_konsultasi->insertcalc('calc', $data);
        }

        //Perhitungan berdasarkan nilai K (5)
        for ($p = 1; $p <= 4; $p++) {
            $gettemp = $this->m_konsultasi->gettempdata();

            foreach ($gettemp as $last) {
                $giv = array(
                    'id_penyakit' => $last['id_penyakit'],
                    'result' => $last['result']
                );
                $giv = $this->m_konsultasi->givtempdata('kval', $giv);
            }

            $count = $this->m_konsultasi->countpenyakit($p);

            $a = (int)$count;
            $store = array(
                'nilai' => $a
            );
            $where = array(
                'id_penyakit' => $p
            );
            $store = $this->m_konsultasi->updatevalue('value', $store, $where);
        }

        //Pemilihan
        $b = $this->m_konsultasi->choosepenyakit();
        $b = (int)$b;

        //Finishing
        $masuk = array(
            'id_diagnosa' => $id_diagnosa,
            'nm_pasien' => $nm_pasien,
            'jns_kelamin' => $jns_kelamin,
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

        $masuk = $this->m_konsultasi->insertpenyakit('diagnosa', $masuk);
        $hapuscalc = $this->m_konsultasi->removecalc();
        $gantivalue = $this->m_konsultasi->zerovalue();
        $kosongkval = $this->m_konsultasi->blankkval();

        $ambil = $this->m_konsultasi->retrievepenyakit($id_diagnosa);
        $file = array(
            'title' => 'Hasil Diagnosa',
            'ambil' => $ambil
        );
        $this->load->view('v_konsultasi_hasil', $file);
    }
}
