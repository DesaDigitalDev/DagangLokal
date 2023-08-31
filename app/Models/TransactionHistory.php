<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    protected $table = "transaction_histories";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'transaction_type_id', 'bank_account_id', 'user_balance_id', 'user_id', 'transaction_no', 'date_time', 'amount', 'status_transaction', 'image',
    ];
}
