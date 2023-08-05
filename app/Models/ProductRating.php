<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRating extends Model
{
    use HasFactory;

    protected $table = "product_ratings";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'product_id', 'user_id', 'rating_value', 'date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
