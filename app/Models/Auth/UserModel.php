<?php

namespace App\Models\Auth;

use CodeIgniter\Model;


class UserModel extends Model
{
	protected $DBGroup = 'default';

	protected $table = 'users';

	protected $allowedFields = [
		'username',
		'email',
		'password',
		'remember_me_token',
		'created_at'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'modified_at';

	public function verifyEmail($email)
	{
		$builder = $this->db->table('users');
		$builder->select('id, email', 'password');
		$builder->where('email', $email);
		$result = $builder->get();
		if (count($result->getResultArray()) >= 1) {
			return $result->getRowArray();
		} else {
			return false;
		}
	}
	public function modifiedAt($id)
	{
		$builder = $this->db->table('users');
		$builder->where('id', $id);
		$builder->update(['modifiedAt' => MYSQLI_TYPE_TIMESTAMP]);
		$result = $builder->get();
		if ($this->db->affectedRows() >= 1) {
			return true;
		} else {
			return false;
		}
	}
}
