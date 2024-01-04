<?php

namespace App\Models\Dashboard;

use CodeIgniter\Model;

use function PHPUnit\Framework\isEmpty;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'users';
    protected $allowedFields = [
        'username',
        'email',
        'password',
        'avatar',
        'gender',
        'bio',
        'status',
        'uniid',
        'remember_me_token',
        'created_at',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    public function getUserData($id)
    {
        $builder = $this->db->table('users');
        $builder->select('username, email, avatar, gender, bio');
        $builder->where('id', $id);
        $result = $builder->get();
        if (is_array($result->getRowArray())) {
            return $result->getRowArray();
        } else {
            return [];
        }
    }
    public function updateAvatar($u_id, $u_avatar)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $u_id);
        $builder->update(['avatar' => $u_avatar]);
        if ($this->db->affectedRows() >= 1) {
            return true;
        } else {
            return false;
        }
    }
    public function updateAccount($u_id, $u_data)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $u_id);
        $builder->update($u_data);
        if ($this->db->affectedRows() >= 1) {
            return true;
        } else {
            return false;
        }
    }
}
