<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerEntries extends Model
{
    use HasFactory;
    protected $fillable =[
    'description',
    'entry_type_id',
    'account_id',
    'transaction_id',
    'cost_center_id',
    'amount',
    'credit/debit',
    'entity_id',
    'current_balance'
    ];
}
