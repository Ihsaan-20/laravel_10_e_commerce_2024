<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $fillable = ['product_id', 'name','original_name','image_path','size','extension'];


    public function getImageUrl()
    {
        if (!empty($this->name) && file_exists(public_path('uploads/product_images/' . $this->name))) {
            return asset('uploads/product_images/' . $this->name);
        } else {
            return '';
        }
    }
    
    

}
