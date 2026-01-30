<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $model = new \App\Models\CourseModel();

        $courses = $model
            ->orderBy('id_course', 'DESC')
            ->findAll(4);

        return view('home', [
            'title'   => 'Beranda',
            'courses' => $courses
        ]);
    }

}
