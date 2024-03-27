<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
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

    public static function getBrands()
    {
        return DB::table('brands')
            ->leftJoin('users', 'users.id', '=', 'brands.created_by')
            ->where('brands.is_deleted', 0)
            ->latest()
            ->get([
                'brands.*',
                'users.name as created_by_name'
            ]);
    }
}
