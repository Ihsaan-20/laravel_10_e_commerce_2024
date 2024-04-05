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
        'created_by','category_id','sub_category_id','brand_id','title','slug','old_price',
        'new_price','short_description','description','additional_info','shipping_returns',
        'meta_title','meta_description','meta_keywords','is_featured','status','is_deleted',
    ];

    public static function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }

    public static function getProductsByCategoryOrSubcategory($category_id = null, $sub_category_id = null)
    {
        $query = self::select(
                'products.*', 'users.name as created_by_name',
                'categories.name as category_name', 'categories.slug as category_slug',
                'sub_categories.name as sub_category_name', 'sub_categories.slug as sub_category_slug'
            )
            ->leftJoin('users', 'users.id', '=', 'products.created_by')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
            ->where('products.is_deleted', 0)
            ->where('products.status', 1)
            ->latest('created_by');

        if ($category_id) {
            $query->where('products.category_id', '=', $category_id);
        }

        if ($sub_category_id) {
            $query->where('products.sub_category_id', '=', $sub_category_id);
        }

        return $query->paginate(10);
    }


    // public static function getProductsByCategoryOrSubcategory($category_id = null, $sub_category_id = null)
    // {
    //     $query = self::select(
    //                         'products.*','users.name as created_by_name',
    //                         'categories.name as category_name', 'categories.slug as category_slug',
    //                         'sub_categories.name as sub_category_name', 'sub_categories.slug as sub_category_slug'
    //                         )
    //                 ->leftJoin('users', 'users.id', '=', 'products.created_by')
    //                 ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
    //                 ->leftJoin('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id');
    //                 if($category_id)
    //                 {
    //                     $query = $query->where('products.category_id', '=', $category_id);
    //                 }
    //                 if($sub_category_id)
    //                 {
    //                     $query = $query->where('products.sub_category_id', '=', $sub_category_id);
    //                 }
    //                 $query = $query->where('products.is_deleted', 0)
    //                                 ->where('products.status', 1)
    //                                 ->latest('created_by')
    //                                 ->paginate(10);
    //     return $query;
    // }
    public static function getProducts()
    {
        return self::select('products.*','users.name as created_by_name', 'categories.name as category_name')
                    ->leftJoin('users', 'users.id', '=', 'products.created_by')
                    ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
                    ->where('products.is_deleted', 0)
                    ->latest('created_by')
                    ->get();
    }

    public static function getCategories()
    {
        return self::select('categories.*')
                    ->join('users', 'users.id', '=', 'categories.created_by')
                    ->where('categories.is_deleted', 0)
                    ->where('categories.status', 1)
                    ->orderBy('categories.name', 'asc')
                    ->get();
    }
    public static function getSubCategories()
    {
        return self::select('sub_categories.*')
                    ->join('users', 'users.id', '=', 'sub_categories.created_by')
                    ->where('sub_categories.is_deleted', 0)
                    ->where('sub_categories.status', 1)
                    ->orderBy('sub_categories.name', 'asc')
                    ->get();
    }
    public static function getBrands()
    {
        return self::select('brands.*')
                    ->join('users', 'users.id', '=', 'brands.created_by')
                    ->where('brands.is_deleted', 0)
                    ->where('brands.status', 1)
                    ->orderBy('brands.name', 'asc')
                    ->get();
    }
    public static function getColors()
    {
        return self::select('colors.*')
                    ->join('users', 'users.id', '=', 'colors.created_by')
                    ->where('colors.is_deleted', 0)
                    ->where('colors.status', 1)
                    ->orderBy('colors.name', 'asc')
                    ->get();
    }

    public function getProductColor() {
        return $this->hasMany(ProductColor::class,  'product_id');
    }
    public function getProductSize() {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

    public function getImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id')
                                            ->orderBy('order_by','asc');
    }

    
}
