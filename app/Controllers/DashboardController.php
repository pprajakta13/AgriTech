<?php

namespace App\Controllers;

use App\Models\CropModel;
use App\Models\PriceModel;
use App\Models\UserModel;
use CodeIgniter\Database\Config;

class DashboardController extends BaseController
{
    // ==========================
    // ADMIN DASHBOARD
    // ==========================
    public function admin()
    {
        $cropModel  = new CropModel();
        $priceModel = new PriceModel();
        $userModel  = new UserModel();

        $db = Config::connect();

        // Dashboard Cards
        $data['totalCrops']  = $cropModel->countAll();
        $data['totalPrices'] = $priceModel->countAll();
        $data['totalUsers']  = $userModel->countAll();

        // Today's Entries
        $data['todayEntries'] = $db->table('mandi_prices')
            ->where('price_date', date('Y-m-d'))
            ->countAllResults();

        // Latest 5 Prices
        $data['latestPrices'] = $priceModel
            ->select('mandi_prices.*, crops.crop_name')
            ->join('crops', 'crops.id = mandi_prices.crop_id')
            ->orderBy('price_date', 'DESC')
            ->limit(5)
            ->find();

        // Chart Data
        $builder = $db->table('mandi_prices');

        $builder->select('price_date, AVG(price_per_quintal) AS avg_price');
        $builder->groupBy('price_date');
        $builder->orderBy('price_date', 'ASC');

        $chart = $builder->get()->getResultArray();

        $labels = [];
        $prices = [];

        foreach ($chart as $row)
        {
            $labels[] = $row['price_date'];
            $prices[] = (float)$row['avg_price'];
        }

        $data['labels'] = json_encode($labels);
        $data['prices'] = json_encode($prices);

        return view('admin/dashboard', $data);
    }

    
    // USER DASHBOARD
   
    public function user()
    {
        $cropModel  = new CropModel();
        $priceModel = new PriceModel();

        $data['totalCrops'] = $cropModel->countAll();
        $data['totalPrices'] = $priceModel->countAll();

        $data['crops'] = $cropModel->findAll();

        $data['prices'] = $priceModel->getPricesWithCrop();

        return view('user/dashboard', $data);
    }
}