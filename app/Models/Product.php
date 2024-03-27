<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'created_by',
        'category_id',
        'sub_category_id',
        'brand_id',
        'title',
        'slug',
        'size',
        'old_price',
        'new_price',
        'short_description',
        'description',
        'additional_info',
        'shipping_returns',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_featured',
        'status',
        'is_deleted',
    ];

    public static function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }

    
}
