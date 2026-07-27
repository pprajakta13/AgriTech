<?php

namespace App\Controllers;

use App\Models\PriceModel;
use App\Models\CropModel;

class AdminPriceController extends BaseController
{
   
    // Display All Prices
    
    public function index()
    {
        $priceModel = new PriceModel();

        $data['prices'] = $priceModel->getPricesWithCrop();

        return view('admin/prices/index', $data);
    }


    // Show Add Price Form
  
    public function create()
    {
        $cropModel = new CropModel();

        $data['crops'] = $cropModel
                            ->orderBy('crop_name', 'ASC')
                            ->findAll();

        return view('admin/prices/create', $data);
    }

    
    // Save Price
   
    public function store()
    {
        $priceModel = new PriceModel();

        $priceModel->save([
            'crop_id'            => $this->request->getPost('crop_id'),
            'market_name'        => $this->request->getPost('market_name'),
            'price_per_quintal'  => $this->request->getPost('price_per_quintal'),
            'price_date'         => $this->request->getPost('price_date'),
        ]);

        return redirect()->to('/admin/prices')
                         ->with('success', 'Price Added Successfully.');
    }

    
    // Show Edit Form
   
    public function edit($id)
    {
        $priceModel = new PriceModel();
        $cropModel  = new CropModel();

        $data['price'] = $priceModel->find($id);

        $data['crops'] = $cropModel
                            ->orderBy('crop_name', 'ASC')
                            ->findAll();

        return view('admin/prices/edit', $data);
    }

    
    // Update Price

    public function update($id)
    {
        $priceModel = new PriceModel();

        $priceModel->update($id, [
            'crop_id'            => $this->request->getPost('crop_id'),
            'market_name'        => $this->request->getPost('market_name'),
            'price_per_quintal'  => $this->request->getPost('price_per_quintal'),
            'price_date'         => $this->request->getPost('price_date'),
        ]);

        return redirect()->to('/admin/prices')
                         ->with('success', 'Price Updated Successfully.');
    }

    // Delete Price
    
    public function delete($id)
    {
        $priceModel = new PriceModel();

        $priceModel->delete($id);

        return redirect()->to('/admin/prices')
                         ->with('success', 'Price Deleted Successfully.');
    }
}