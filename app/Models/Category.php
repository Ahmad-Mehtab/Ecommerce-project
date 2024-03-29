<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'add_categories';
    protected $fillable =[
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
    ];
}
