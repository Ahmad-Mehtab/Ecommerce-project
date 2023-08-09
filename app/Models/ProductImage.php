<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = [
        'product_id',
        'image',
        'product_id',
        'product_id',
    ];
    use HasFactory;
}
