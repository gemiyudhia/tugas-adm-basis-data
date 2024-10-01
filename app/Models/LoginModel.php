<?php 

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'admin';
    protected $allowedFields = ['username', 'password'];

    public function getUser($username)
    {
        return $this->where('username', $username)->first();
    }
}