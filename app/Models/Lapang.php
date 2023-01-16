<?php

namespace App\Models;

use CodeIgniter\Model;

class Lapang extends Model
{
    protected $table         = 'lapang';
    protected $primaryKey    = 'id_user';
    protected $allowedFields = ['tanggal', 'jam_main', 'selesai', 'lapang', 'nama_tim'];
    protected $useAutoIncrement = true;

    public function getLapang($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id])->first();
    }
}