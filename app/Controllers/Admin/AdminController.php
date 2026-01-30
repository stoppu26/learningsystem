<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CourseModel;

class AdminController extends BaseController
{
 
    protected function noCache()
    {
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    public function guruPending()
    {
        $this->noCache();

        $userModel = new UserModel();

        $teachers = $userModel
            ->where('role', 'guru')
            ->where('status', 'pending')
            ->findAll();

        return view('admin/guru_pending', [
            'title' => 'Guru Pending',
            'teachers' => $teachers
        ]);
    }

    public function approveGuru($id)
    {

        $userModel = new UserModel();

        $userModel->update($id, [
            'status' => 'active'
        ]);

        return redirect()->back()->with('success', 'Guru berhasil disetujui.');
    }

    public function rejectGuru($id)
    {

        $userModel = new UserModel();

        $userModel->update($id, [
            'status' => 'blocked'
        ]);

        return redirect()->back()->with('success', 'Guru ditolak.');
    }

    public function dashboard()
    {
        $this->noCache();

        $userModel = new UserModel();
        $courseModel = new CourseModel();

        return view('admin/dashboard', [
            'totalUser'    => $userModel->countAll(),
            'guruPending' => $userModel->where('role','guru')->where('status','pending')->countAllResults(),
            'totalCourse' => $courseModel->countAll()
        ]);
    }


    public function users()
    {
        $this->noCache();

        $userModel = new UserModel();

        $users = $userModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('admin/users', [
            'title' => 'Kelola User',
            'users' => $users
        ]);
    }

    public function updateStatus($id, $status)
    {
        $allowedStatus = ['active', 'pending', 'blocked'];

        if (!in_array($status, $allowedStatus)) {
            return redirect()->back()->with('error', 'Status tidak valid');
        }

        $userModel = new UserModel();
        $userModel->update($id, ['status' => $status]);

        return redirect()->back()->with('success', 'Status user diperbarui');
    }

}
