<?php

namespace App\Models;

use CodeIgniter\Model;

class FakultasModel extends Model
{
    protected $table = 'tbl_fakultas';
    protected $primaryKey = 'kode_fakultas';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_fakultas'];
}
