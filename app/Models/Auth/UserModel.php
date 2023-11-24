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
		'created_at'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'modified_at';
}
