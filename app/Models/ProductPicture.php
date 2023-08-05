<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPicture extends Model
{
    use HasFactory;

    protected $table = "product_pictures";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'product_id', 'link', 'sequence_no',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
