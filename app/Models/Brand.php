<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Brand extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'brand_name',
        'status',
    ];
}
