<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendProductController extends Controller
{
    public function category($category, $subcategory = '') // slugs
    {
        // dd($category, $subcategory);
        $getCategory = Category::getCategoryBySlug($category);
        $getSubCategory = SubCategory::getSubCategoryBySlug($subcategory);
        if(!empty($getCategory) && !empty($getSubCategory))
        {
            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;
            return view('frontend.product.list', compact('data'));
        }
        else if(!empty($getCategory))
        {
            $data['getCategory'] = $getCategory;
            return view('frontend.product.list', compact('data'));
        }
        else
        {
            abort(404);
        }
        
    }


}
