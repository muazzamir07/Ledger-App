<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'entity_id',
        'account_type_id',
        'current_balance',
        'updated_at',
        'created_at',
    ];
}
