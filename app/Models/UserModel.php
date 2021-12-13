<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = "product";
    protected $allowedFields = ["name", "price", "image", "category", "created_by"];
    protected $useTimestamps = true;
}