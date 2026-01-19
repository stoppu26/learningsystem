<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\MaterialModel;

class Courses extends BaseController
{
    public function index()
    {
        $model = new CourseModel();
        return $this->response->setJSON([
            'status' => 'success',
            'data' => $model->where('is_public', 1)->findAll()
        ]);
    }

    public function show($id)
    {
        $model = new CourseModel();
        $course = $model->find($id);

        if (!$course) {
            return $this->response->setStatusCode(404)->setJSON([
                'status' => 'error',
                'message' => 'Course not found'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $course
        ]);
    }

    public function materials($id)
    {
        $model = new MaterialModel();
        return $this->response->setJSON([
            'status' => 'success',
            'data' => $model->where('id_course', $id)->findAll()
        ]);
    }
}
