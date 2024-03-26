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
        'category_id',
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'created_by',
        'is_deleted',
    ];
    static public function getSubCategories()
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
    // static public function getSubCategories()
    // {
    //     return DB::table('sub_categories')
    //         ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
    //         ->leftJoin('users', 'users.id', '=', 'sub_categories.created_by')
    //         ->where('sub_categories.is_deleted', 0)
    //         ->latest()
    //         ->paginate(10, [
    //             'sub_categories.*',
    //             'users.name as created_by_name',
    //             'categories.name as category_name'
    //         ]);
    // }


}
