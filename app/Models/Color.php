<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable = [
        'name',
        'color_code',
        'status',
        'created_by',
        'is_deleted',
    ];

    public static function getColors()
    {
        return DB::table('colors')
            ->leftJoin('users', 'users.id', '=', 'colors.created_by')
            ->where('colors.is_deleted', 0)
            ->latest()
            ->get([
                'colors.*',
                'users.name as created_by_name'
            ]);
    }
}
