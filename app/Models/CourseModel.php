<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id_course';

    protected $allowedFields = [
        'title',
        'description',
        'angkatan',
        'is_public',
        'thumbnail'
    ];
}
