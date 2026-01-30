<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'password',
        'role',
        'status'
    ];

    protected $validationRules = [
        'name'     => 'required|min_length[3]',
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
        'role'     => 'required|in_list[siswa,guru]'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Email sudah terdaftar. Silakan gunakan email lain.'
        ]
    ];
}
