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

    public static function getProducts()
    {
        return DB::table('products')
            ->leftJoin('users', 'users.id', '=', 'products.created_by')
            ->leftJoin('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
            ->where('products.is_deleted', 0)
            ->latest()
            ->get([
                'products.*',
                'users.name as created_by_name',
                'categories.name as category_name',
                'sub_categories.name as sub_category_name',
                'brands.name as brand_name'
            ]);
    }

    
}
