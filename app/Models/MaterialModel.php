<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterialModel extends Model
{
    protected $table = 'materials';
    protected $allowedFields = ['id_course', 'title', 'type', 'url'];
}
