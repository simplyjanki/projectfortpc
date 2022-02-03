<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=
    ([
        'client_id','date_of_txn','transaction_type','transaction_amount','old_balance','current_balance','transaction_id'
    ]);
}
