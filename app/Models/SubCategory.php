<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $fillable = [
        'category_id','name','slug','meta_title','meta_description',
        'meta_keywords','status','created_by','is_deleted',
    ];
    public static function getSubCategoryBySlug($slug)
    {
        return self::select('sub_categories.*')
                        ->where('sub_categories.is_deleted', '=', 0)
                        ->where('sub_categories.status', '=', 1)
                        ->where('sub_categories.slug', '=', $slug)
                        ->first();
    }

    public static function getSubCategories()
    {
        return DB::table('sub_categories')
            ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->leftJoin('users', 'users.id', '=', 'sub_categories.created_by')
            ->where('sub_categories.is_deleted', 0)
            ->latest()
            ->get([
                'sub_categories.*',
                'users.name as created_by_name',
                'categories.name as category_name'
            ]);
    }
    //with pagination;
    static public function getSubCategoriesByCategoryId($category_id)
    {
        return DB::table('sub_categories')
            ->leftJoin('users', 'users.id', '=', 'sub_categories.created_by')
            ->where('sub_categories.is_deleted', 0)
            ->where('sub_categories.status', 1)
            ->where('sub_categories.category_id', $category_id)
            ->orderBy('sub_categories.name', 'asc')
            ->get(['sub_categories.*']);
    }


}
