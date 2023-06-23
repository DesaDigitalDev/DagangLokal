<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'name', 'user_id', 'is_in_warehouse', 'unit_in_stock', 'category_id', 'vendor', 'unit_price', 'unit_weight', 'bpom_no', 'description',
    ];
}
