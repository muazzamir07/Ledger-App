<?php

namespace App\Models;

use App\Traits\SelfReferenceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    use SelfReferenceTrait;

    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'updated_at',
        'created_at',
    ];
}
