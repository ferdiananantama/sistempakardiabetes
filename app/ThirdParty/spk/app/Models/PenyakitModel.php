<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $table = 'penyakit';
    protected $primaryKey = 'id_penyakit';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'informasi'];
}
