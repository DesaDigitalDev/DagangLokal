<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "bank_accounts";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'bank_id', 'user_id', 'name', 'account_no', 'type',
    ];
}
