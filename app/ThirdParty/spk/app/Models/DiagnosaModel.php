<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosaModel extends Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function data()
    {
    }
}
