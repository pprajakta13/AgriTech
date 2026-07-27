<?php

namespace App\Controllers;

use App\Models\CropModel;
use App\Models\PriceModel;

class HomeController extends BaseController
{
    public function index()
    {
        $cropModel = new CropModel();
        $priceModel = new PriceModel();

        $data['crops'] = $cropModel->limit(4)->findAll();

        $data['prices'] = $priceModel
            ->select('mandi_prices.*, crops.crop_name')
            ->join('crops', 'crops.id = mandi_prices.crop_id')
            ->orderBy('price_date', 'DESC')
            ->findAll();

        return view('home', $data);
    }
}