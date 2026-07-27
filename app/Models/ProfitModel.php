<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfitModel extends Model
{
    protected $table = 'profit_calculations';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'crop_id',
        'land_area',
        'production_qty',
        'selling_price',
        'total_cost',
        'profit'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}