<?php

namespace App\Models;

use CodeIgniter\Model;

class PriceModel extends Model
{
    protected $table = 'mandi_prices';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'crop_id',
        'market_name',
        'price_per_quintal',
        'price_date'
    ];

    /**
     * Get all prices with crop name
     */
    public function getPricesWithCrop()
    {
        return $this->select('
                mandi_prices.*,
                crops.crop_name
            ')
            ->join('crops', 'crops.id = mandi_prices.crop_id')
            ->orderBy('price_date', 'DESC')
            ->findAll();
    }

    /**
     * Get one price with crop name
     */
    public function getPrice($id)
    {
        return $this->select('
                mandi_prices.*,
                crops.crop_name
            ')
            ->join('crops', 'crops.id = mandi_prices.crop_id')
            ->where('mandi_prices.id', $id)
            ->first();
    }
}