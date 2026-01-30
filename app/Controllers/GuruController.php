<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\MaterialModel;

class GuruController extends BaseController
{
    public function dashboard()
    {
        $courseModel = new CourseModel();

        $courses = $courseModel
            ->where('created_by', session()->get('user_id'))
            ->findAll();

        return view('guru/dashboard', [
            'title'   => 'Dashboard Guru',
            'courses' => $courses
        ]);
    }

    public function pending()
    {
        return view('guru/pending');
    }

    public function create()
    {
        $courseModel = new CourseModel();

        $courses = $courseModel
            ->where('created_by', session()->get('user_id'))
            ->findAll();

        return view('guru/material_create', [
            'courses' => $courses
        ]);
    }

    public function courses()
    {
        $model = new CourseModel();
        $q = $this->request->getGet('q');

        $model->where('created_by', session()->get('user_id'));

        if ($q) {
            $model->like('title', $q);
        }

        $courses = $model->findAll();

        return view('guru/courses', [
            'title' => 'Mata Pelajaran',
            'courses' => $courses,
            'q' => $q
        ]);
    }

    public function createCourse()
    {
        return view('guru/course_create', [
            'title' => 'Tambah Mata Pelajaran'
        ]);
    }

    public function storeCourse()
    {
        $model = new CourseModel();

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'kelas'       => $this->request->getPost('kelas'),
            'category'    => $this->request->getPost('category'),
            'created_by'  => session()->get('user_id'),
            'is_public'   => 1,
        ];

        // thumbnail optional
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            $name = $file->getRandomName();
            $file->move('uploads/thumbnails', $name);
            $data['thumbnail'] = '/uploads/thumbnails/'.$name;
        }

        $model->insert($data);
        return redirect()->to('/guru/courses')->with('success', 'Mata pelajaran ditambahkan');
    }

    public function deleteCourse($id)
    {
        $model = new CourseModel();
        $model->delete($id);
        return redirect()->back()->with('success', 'Mata pelajaran dihapus');
    }

    public function storeMaterial()
    {
        $courseId = $this->request->getPost('course_id');
        $file = $this->request->getFile('file');
        $type = $this->request->getPost('type');

        $path = null;

        if ($type === 'zip') {

            // folder target
            $folderName = uniqid('mat_');
            $targetPath = FCPATH . 'uploads/materials/' . $folderName;

            mkdir($targetPath, 0777, true);

            // simpan zip
            $zipPath = $file->move($targetPath, $file->getName());

            // extract
            $zip = new \ZipArchive;
            $zip->open($targetPath . '/' . $file->getName());
            $zip->extractTo($targetPath);
            $zip->close();

            // path utama = index.html
            $path = 'uploads/materials/' . $folderName . '/index.html';
        }

        if ($type === 'video' || $type === 'link') {
            $path = $this->request->getPost('link');
        }

        // simpan ke DB
        $model = new MaterialModel();
        $model->insert([
            'id_course'   => $courseId,
            'created_by'  => session()->get('user_id'),
            'title'       => $this->request->getPost('title'),
            'type'        => $type,
            'content_url' => $path,
        ]);

        return redirect()->back();
    }

}
