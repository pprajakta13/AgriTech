<?php

namespace App\Models;

use CodeIgniter\Model;

class CropModel extends Model
{
    protected $table = 'crops';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'crop_name',
        'category'
    ];
}