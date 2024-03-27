<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'created_by',
        'is_deleted',
    ];
    public static function getCategories()
    {
        return DB::table('categories')
            ->leftJoin('users', 'users.id', '=', 'categories.created_by')
            ->where('categories.is_deleted', 0)
            ->latest()
            ->get([
                'categories.*',
                'users.name as created_by_name'
            ]);
    }

    // static public function getCategories()
    // {
    //     return self::select('categories.*', 'users.name as created_by_name')
    //                     ->join('users','users.id', '=', 'categories.created_by')
    //                     ->where('categories.is_deleted', '=', 0)
    //                     ->latest()
    //                     ->get();
    // }

}
