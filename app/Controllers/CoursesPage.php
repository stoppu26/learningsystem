<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\MaterialModel; 

class CoursesPage extends BaseController
{
    public function index()
    {
        $model = new \App\Models\CourseModel();

        $category = $this->request->getGet('category');
        $q        = $this->request->getGet('q');

        if ($category) {
            $model->where('category', $category);
        }

        if ($q) {
            $model->like('title', $q);
        }

        // ambil total (tanpa reset query)
        $total = $model->countAllResults(false);

        $courses = $model->paginate(12, 'courses');
        $pager   = $model->pager;

        return view('courses/index', [
            'courses'  => $courses,
            'pager'    => $pager,
            'category' => $category,
            'q'        => $q,
            'total'    => $total
        ]);
    }


    public function detail($id)
    {
        $courseModel = new CourseModel();
        $materialModel = new MaterialModel();

        $course = $courseModel->find($id);

        if (!$course) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mata pelajaran tidak ditemukan');
        }

        $materials = $materialModel
            ->where('id_course', $id)
            ->findAll();

        return view('courses/detail', [
            'course'    => $course,
            'materials' => $materials
        ]);
    }
}
