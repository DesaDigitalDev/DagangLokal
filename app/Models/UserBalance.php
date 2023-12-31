<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
    use HasFactory;

    protected $table = "user_balances";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'user_id', 'balance'
    ];
}
