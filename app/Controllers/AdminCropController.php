<?php

namespace App\Controllers;

use App\Models\CropModel;

class AdminCropController extends BaseController
{
    public function index()
    {
        $model = new CropModel();

        $data['crops'] = $model
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('admin/crops/index', $data);
    }

    public function create()
    {
        return view('admin/crops/create');
    }

    public function store()
    {
        $model = new CropModel();

        $model->save([
            'crop_name' => $this->request->getPost('crop_name'),
            'category'  => $this->request->getPost('category')
        ]);

        return redirect()->to('/admin/crops')
            ->with('success', 'Crop Added Successfully.');
    }

    public function edit($id)
    {
        $model = new CropModel();

        $data['crop'] = $model->find($id);

        return view('admin/crops/edit', $data);
    }

    public function update($id)
    {
        $model = new CropModel();

        $model->update($id, [
            'crop_name' => $this->request->getPost('crop_name'),
            'category'  => $this->request->getPost('category')
        ]);

        return redirect()->to('/admin/crops')
            ->with('success', 'Crop Updated Successfully.');
    }

    public function delete($id)
    {
        $model = new CropModel();

        $model->delete($id);

        return redirect()->to('/admin/crops')
            ->with('success', 'Crop Deleted Successfully.');
    }
}