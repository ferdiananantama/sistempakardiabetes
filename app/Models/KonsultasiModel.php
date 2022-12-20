<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    function data()
    {
        $builder = $this->db->table('gejala')->get();
        return $builder->getResultArray();
    }

    function last_diagnosa()
    {
        $builder = $this->db->table('diagnosa');
        $builder->select('id_diagnosa');
        $builder->orderBy('id_diagnosa', 'desc');
        $builder->limit(1);
        return $builder->get()->getrow()->id_diagnosa;
    }

    public function updatevalue($store, $where)
    {
        $builder = $this->db->table('valuee');
        $builder->update($store, $where);
    }

    public function getrow($i)
    {
        $builder = $this->db->table('diagnosa');
        $builder->where('id_diagnosa', $i);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function insertcalc($data)
    {
        $builder = $this->db->table('kalkulasi');
        $builder->insert($data);
        return $builder;
    }

    public function gettempdata()
    {
        $builder = $this->db->table('kalkulasi');
        $builder->select('id_penyakit, result');
        $builder->orderby('result', 'asc');
        $builder->limit(5);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function givtempdata($giv)
    {
        $builder = $this->db->table('urutan');
        $builder->insert($giv);
        return $builder;
    }

    public function countpenyakit($p)
    {
        $builder = $this->db->table('urutan');
        $builder->countAll('id_penyakit');
        $builder->where('id_penyakit', $p);
        $builder->orderby('result', 'desc');
        return $builder->countAllResults();
    }

    public function choosepenyakit()
    {
        $builder = $this->db->table('valuee');
        $builder->select('id_penyakit', 'nilai');
        $builder->orderby('nilai', 'desc');
        $builder->limit(1);
        return $builder->get()->getrow()->id_penyakit;
    }

    public function insertpenyakit($masuk)
    {
        $builder = $this->db->table('diagnosa');
        $builder->insert($masuk);
        return $builder;
    }

    public function retrievepenyakit($id_diagnosa)
    {
        $builder = $this->db->table('diagnosa');
        $builder->join('penyakit', 'penyakit.id_penyakit = diagnosa.id_penyakit');
        $builder->where('id_diagnosa', $id_diagnosa);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function removecalc()
    {
        $builder = $this->db->table('kalkulasi');
        $builder->from('kalkulasi');
        $builder->truncate();
    }

    public function zerovalue()
    {
        $query = $this->db->query('UPDATE valuee SET nilai = 0');
        return $query;
    }

    public function blankkval()
    {
        $builder = $this->db->table('urutan');
        $builder->from('urutan');
        $builder->truncate();
    }
}
