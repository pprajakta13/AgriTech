<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminUserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data['users'] = $userModel
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('admin/users/index', $data);
    }

    public function delete($id)
    {
        $userModel = new UserModel();

        if ($id == session()->get('id'))
        {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $userModel->delete($id);

        return redirect()->to('/admin/users')
            ->with('success', 'User deleted successfully.');
    }
}