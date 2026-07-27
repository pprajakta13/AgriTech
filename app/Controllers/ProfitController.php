<?php

namespace App\Controllers;

use App\Models\CropModel;
use App\Models\PriceModel;

class ProfitController extends BaseController
{
    public function index()
    {
        $cropModel = new CropModel();

        $data['crops'] = $cropModel->findAll();

        return view('profit/index', $data);
    }

public function calculate()
{
    $cropId   = $this->request->getPost('crop_id');
    $quantity = (float)$this->request->getPost('quantity');
    $cost     = (float)$this->request->getPost('cost');

    $cropModel = new CropModel();
    $priceModel = new PriceModel();

    // Get all crops for dropdown
    $data['crops'] = $cropModel->findAll();

    // Get latest price
    $price = $priceModel
        ->where('crop_id', $cropId)
        ->orderBy('price_date', 'DESC')
        ->first();

    if (!$price) {
        $data['error'] = "Price not found for selected crop.";
        return view('profit/index', $data);
    }

    $marketPrice = (float)$price['price_per_quintal'];

    $revenue = $marketPrice * $quantity;
    $profit = $revenue - $cost;

    $data['result'] = [
        'market_price' => $marketPrice,
        'quantity'     => $quantity,
        'cost'         => $cost,
        'revenue'      => $revenue,
        'profit'       => $profit
    ];

    return view('profit/index', $data);
}
}