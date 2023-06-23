<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    use HasFactory;

    protected $table = "product_pictures";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'product_id', 'link', 'sequence_no',
    ];
}
