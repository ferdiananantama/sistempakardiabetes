<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\GejalaModel;
use App\Models\LatihModel;
use App\Models\PenyakitModel;

class admin extends BaseController
{
    public function __construct()
    {
        $this->penyakitModel = new PenyakitModel();
        $this->gejalaModel = new GejalaModel();
        $this->latihModel = new LatihModel();
        $this->adminModel = new AdminModel();
    }
    public function user()
    {
        $admin = $this->adminModel->findAll();
        $data = [
            'admin' => $admin
        ];
        return view('admin/user', $data);
    }
    public function gejala()
    {
        $gejala = $this->gejalaModel->findAll();
        $data = [
            'gejala' => $gejala
        ];

        return view('admin/gejala', $data);
    }
    public function penyakit()
    {
        $penyakit = $this->penyakitModel->findAll();

        $data = [
            'penyakit' => $penyakit
        ];

        return view('admin/penyakit', $data);
    }
    public function createpenyakit()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/createpenyakit', $data);
    }
    public function creategejala()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/creategejala', $data);
    }
    public function createlatih()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/createlatih', $data);
    }
    public function save()
    {
        //validasi input 
        if (!$this->validate([
            'penyakit' => [
                'rules' => 'required|is_unique[penyakit.nama]',
                'errors' => [
                    'required' => 'Nama {field} harus diisi.',
                    'is_unique' => 'Nama {field} sudah terdaftar'
                ]
            ],
            'informasi' => [
                'rules' => 'required|min_length[10]|is_unique[penyakit.informasi]',
                'errors' => [
                    'required' => 'Nama {field} harus diisi.',
                    'min_length' => '{field} minimal 10 karakter',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $this->penyakitModel->save([
            'nama' => $this->request->getVar('penyakit'),
            'informasi' => $this->request->getVar('informasi')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('admin/penyakit');
    }
    public function insert()
    {
        //validasi input 
        if (!$this->validate([
            'nomor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kode harus diisi.'
                ]
            ],
            'gejala' => [
                'rules' => 'required|is_unique[gejala.nama_gejala]',
                'errors' => [
                    'required' => '{field} peyakit harus diisi.',
                    'is_unique' => '{field} penyakit sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $this->gejalaModel->insert([
            'id_gejala' => $this->request->getVar('nomor'),
            'nama_gejala' => $this->request->getVar('gejala')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('admin/gejala');
    }
    public function latih()
    {
        $data = $this->latihModel->list_latih();
        $penyakit = $this->latihModel->list_penyakit();
        $gejala = $this->latihModel->list_gejala();
        $count = $this->latihModel->count();
        $latih = $this->latihModel->last_latih();
        $last = (int)$latih + 1;
        $data = array(
            'title' => 'Data Latih',
            'data' => $data,
            'penyakit' => $penyakit,
            'gejala' => $gejala,
            'count' => $count,
            'last' => $last
        );
        echo view('admin/latih', $data);
    }
    public function delete($id_penyakit)
    {
        $this->penyakitModel->where('id_penyakit', $id_penyakit)->delete($id_penyakit);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/admin/penyakit');
    }
    public function hapus($id_gejala)
    {
        $this->gejalaModel->where('id_gejala', $id_gejala)->delete($id_gejala);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/admin/gejala');
    }
    public function busak($id_diagnosa)
    {
        $this->latihModel->where('id_diagnosa', $id_diagnosa)->delete($id_diagnosa);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/admin/latih');
    }
    public function editgejala($id_gejala)
    {
        $gejala = $this->gejalaModel->find($id_gejala);
        $data = [
            'validation' => \Config\Services::validation(),
            'gejala' => $gejala
        ];
        return view('admin/editgejala', $data);
    }
    public function updategejala($id_gejala)
    {
        $this->gejalaModel->save([
            'id_gejala' => $this->request->getVar('nomor'),
            'kode' => $id_gejala,
            'nama_gejala' => $this->request->getVar('gejala')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('admin/gejala');
    }
    public function editpenyakit($id_penyakit)
    {
        $penyakit = $this->penyakitModel->find($id_penyakit);
        $data = [
            'validation' => \Config\Services::validation(),
            'penyakit' => $penyakit
        ];
        return view('admin/editpenyakit', $data);
    }
    public function updatepenyakit($id_penyakit)
    {
        $this->penyakitModel->save([
            'id_penyakit' => $this->request->getVar('nomor'),
            'kode' => $id_penyakit,
            'nama' => $this->request->getVar('penyakit'),
            'informasi' => $this->request->getVar('informasi')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('admin/penyakit');
    }
    public function editlatih($id_diagnosa)
    {
        $latih = $this->latihModel->find($id_diagnosa);
        $data = [
            'validation' => \Config\Services::validation(),
            'latih' => $latih
        ];
        return view('admin/editlatih', $data);
    }
    public function updatelatih($id_diagnosa)
    {
        $this->latihModel->save([
            'kode' => $id_diagnosa,
            'nama' => $this->request->getVar('nama_pasien'),
            'jenis' => $this->request->getVar('jenis_kelamin'),
            'umur' => $this->request->getVar('usia')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('admin/latih');
    }
}
