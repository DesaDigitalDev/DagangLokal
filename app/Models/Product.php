<?php

namespace App\Models;

use App\Models\ProductRating;
use App\Models\ProductComment;
use App\Models\ProductPicture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'name', 'user_id', 'is_in_warehouse', 'unit_in_stock', 'category_id', 'vendor', 'unit_price', 'unit_weight', 'bpom_no', 'description',
    ];

    public function pictures()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }
    public function comments()
    {
        return $this->hasMany(ProductComment::class);
    }
}
