<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'amount',
        'transaction_type_id',
        'tax_id',
        'updated_at',
        'created_at',
        'account_id1',
        'account_id2',
        'cost_center_id',
    ];
}
