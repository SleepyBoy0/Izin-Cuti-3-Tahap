<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelCuti extends Model
{
    protected $table      = 'cuti';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['user_id', 'leave_start', 'leave_end', 'reason', 'total_leave', 'status', 'validation', 'lvl1', 'lvl2', 'lvl3'];
    public function get_cuti()
    {
        $hasil = $this->db->query("SELECT * FROM cuti WHERE id");
        return $hasil->getResult();
    }

    public function save_data_cuti($data)
    {
        $this->db->table('cuti')->insert($data);
    }

    public function get_edit_cuti($id)
    {
        $hasil = $this->db->query("SELECT * FROM cuti WHERE id = $id");
        return $hasil->getResult();
    }

    public function get_cuti_id($id)
    {
        $hasil = $this->db->query("SELECT * FROM cuti WHERE user_id = $id");
        return $hasil->getResult();
    }

    public function get_user_id($id)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE id = $id");
        return $hasil->getResult();
    }

    public function data_lvl1()
    {
        $hasil = $this->db->query("SELECT * FROM cuti WHERE lvl1 = 1 order by id");
        return $hasil->getResult();
    }

    public function data_lvl2()
    {
        $hasil = $this->db->query("SELECT * FROM cuti WHERE lvl2 = 1 order by id");
        return $hasil->getResult();
    }

    public function data_lvl3()
    {
        $hasil = $this->db->query("SELECT * FROM cuti WHERE lvl3 = 1 order by id");
        return $hasil->getResult();
    }
}