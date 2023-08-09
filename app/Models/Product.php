<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $tabale = 'products';
    protected $fillable =[
        'category_id',
        'slug',
        'brand',
        'samll_description',
        'description',
        'orignal_price',
        'selling_price',
        'quality',
        'treding',
        'status',
        'meta_title',
        'quality',
        'meta_keyword',
        'meta_description',
        'meta_description',
    ];
    use HasFactory;
}
