<?php

namespace App\Models;

use CodeIgniter\Model;

class Orang extends Model
{
    protected $table         = 'orang';
    protected $primaryKey    = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat'];
    protected $useAutoIncrement = true;

    public function search($keyword)
    {
        $builder = $this->table('orang');
        $builder->like('nama', $keyword);
        $builder->orLike('alamat', $keyword);
        return $builder;
    }

    public function getOrang($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}