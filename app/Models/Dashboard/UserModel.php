<?php

namespace App\Models\Dashboard;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'users';
    protected $allowedFields = [
        'username',
        'email',
        'password',
        'avatar',
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

    public function updatedAt($u_id, $u_avatar)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $u_id);
        $builder->update(['profile_pic' => $u_avatar]);
        if ($this->db->affectedRows() >= 1) {
            return true;
        } else {
            return false;
        }
    }
}
