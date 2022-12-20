<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table = 'gejala';
    protected $primaryKey = 'id_gejala';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_gejala'];
}
