<?php

namespace App\Models\Auth;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;


class UserModel extends Model
{
	protected $DBGroup = 'default';

	protected $table = 'users';

	protected $allowedFields = [
		'username',
		'email',
		'password',
		'uniid',
		'remember_me_token',
		'created_at'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function verifyEmail($email)
	{
		$builder = $this->db->table('users');
		$builder->select('id,username, email,uniid');
		$builder->where('email', $email);
		$result = $builder->get();
		if (count($result->getResultArray()) >= 1) {
			return $result->getRowArray();
		} else {
			return false;
		}
	}
	public function updatedAt($id)
	{
		$datetime = date('Y-m-d H:i:s');

		$builder = $this->db->table('users');
		$builder->where('id', $id);
		$builder->update(['updated_at' => $datetime]);
		if ($this->db->affectedRows() >= 1) {
			return true;
		} else {
			return false;
		}
	}
	public function verifyToken($token)
	{
		$builder = $this->db->table('users');
		$builder->select('id,username, email,uniid,updated_at');
		$builder->where('uniid', $token);
		$result = $builder->get();
		if (count($result->getResultArray()) >= 1) {
			return $result->getRowArray();
		} else {
			return false;
		}
	}
	public function updatePassword($token, $password)
	{
		$builder = $this->db->table('users');
		$builder->where('uniid', $token);
		$builder->update(['password'=> $password]);
		if ($this->db->affectedRows() >= 1) {
			return true;
		} else {
			return false;
		}
	}
}
