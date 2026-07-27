<?php

namespace App\Controllers;

use App\Models\PriceModel;

class PriceController extends BaseController
{
    public function index()
    {
        $priceModel = new PriceModel();

        $data['prices'] = $priceModel->findAll();

        return view('prices/index', $data);
    }
}