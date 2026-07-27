<?php

namespace App\Controllers;

use App\Models\CropModel;

class CropController extends BaseController
{
    public function index()
    {
        $cropModel = new CropModel();

        $data['crops'] = $cropModel->findAll();

        return view('crops/index', $data);
    }
}