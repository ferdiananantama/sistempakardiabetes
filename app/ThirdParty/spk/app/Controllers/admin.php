<?php

namespace App\Controllers;

use App\Models\GejalaModel;
use App\Models\PenyakitModel;

class admin extends BaseController
{
    public function user()
    {
        return view('admin/user');
    }
    protected $gejalaModel, $penyakitModel;
    public function __construct()
    {
        $this->penyakitModel = new PenyakitModel();
        $this->gejalaModel = new GejalaModel();
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
    public function latih()
    {
        return view('admin/latih');
    }
    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/create', $data);
    }
    public function creategejala()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/creategejala', $data);
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
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/create')->withInput()->with('validation', $validation);
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
            'gejala' => [
                'rules' => 'required|is_unique[gejala.nama_gejala]',
                'errors' => [
                    'required' => '{field} peyakit harus diisi.',
                    'is_unique' => '{field} penyakit sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/creategejala')->withInput()->with('validation', $validation);
        }
        $this->gejalaModel->insert([
            'id_gejala' => $this->request->getVar('nomor'),
            'nama_gejala' => $this->request->getVar('gejala')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('admin/gejala');
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
}
