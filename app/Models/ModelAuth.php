<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['position_id', 'name', 'phone_number', 'user_number', 'phone_number', 'password', 'username', 'sex'];



    public function save_register($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function login($username,$password)
    {
        return $this->db->table('user')->where([
            'username'=>$username,
            'password'=>$password,
        ])->get()->getRowArray();
    }

    public function get_user()
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE position_id = '1' ORDER BY create_at ASC");
        return $hasil->getResult();
    }

    public function count_pegawai()
    {
        return $this->db->table('user')->where('position_id =', 1)->countAllResults();
    }

    public function count_leave()
    {
        return $this->db->table('cuti')->countAll();
    }

    public function count_valid()
    {
        return $this->db->table('cuti')->where('validation =', 3)->countAllResults();
    }

    public function get_edit_user($id)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE id = $id");
        return $hasil->getResult();
    }

    public function get_position()
    {
        $hasil = $this->db->query("SELECT * FROM user join position on user.position_id = position.id");
        return $hasil;
    }
}