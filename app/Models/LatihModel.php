<?php

namespace App\Models;

use CodeIgniter\Model;

class LatihModel extends Model
{
    protected $table = 'diagnosa';
    protected $primaryKey = 'id_diagnosa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_pasien', 'jenis_kelamin', 'usia', 'id_penyakit'];

    function list_latih()
    {
        $builder = $this->db->table('diagnosa');
        $builder->join('penyakit', 'penyakit.id_penyakit = diagnosa.id_penyakit');
        $builder->orderBy('id_diagnosa', 'asc');
        $res = $builder->get();
        return $res->getResultArray();
    }

    function list_penyakit()
    {
        $builder = $this->db->table('penyakit');
        $builder->get();
        return $builder->get();
    }

    function list_gejala()
    {
        $builder = $this->db->table('gejala');
        $builder->get();
        return $builder->get();
    }

    function last_latih()
    {
        $builder = $this->db->table('diagnosa');
        $builder->select('id_diagnosa');
        $builder->orderBy('id_diagnosa', 'desc');
        $builder->limit(1);
        return $builder->get()->getRow()->id_diagnosa;
    }

    function count()
    {
        $builder = $this->db->query('SELECT * FROM gejala');
        if ($builder->getNumRows() > 0) {
            return $builder->getNumRows();
        } else {
            return 0;
        }
    }
}
