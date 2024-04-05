<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendProductController extends Controller
{
    public function category($category, $subcategory = '')
    {
        $getCategory = Category::getCategoryBySlug($category);
        $getSubCategory = $subcategory ? SubCategory::getSubCategoryBySlug($subcategory) : null;

        if ($getCategory) {
            $data['getCategory'] = $getCategory;
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;
            
            if ($getSubCategory) {
                $data['getSubCategory'] = $getSubCategory;
                $data['meta_title'] = $getSubCategory->meta_title ?? $data['meta_title'];
                $data['meta_description'] = $getSubCategory->meta_description ?? $data['meta_description'];
                $data['meta_keywords'] = $getSubCategory->meta_keywords ?? $data['meta_keywords'];
                
                $data['getProducts'] = Product::getProductsByCategoryOrSubcategory($getCategory->id, $getSubCategory->id);
            } else {
                $data['getProducts'] = Product::getProductsByCategoryOrSubcategory($getCategory->id);
            }

            return view('frontend.product.list', compact('data'));
        }

        abort(404);
    }



    // public function category($category, $subcategory = '') // slugs
    // {
    //     $getCategory = Category::getCategoryBySlug($category);
    //     $getSubCategory = SubCategory::getSubCategoryBySlug($subcategory);
    //     if(!empty($getCategory) && !empty($getSubCategory))
    //     {
    //         $data['getCategory'] = $getCategory;
    //         $data['getSubCategory'] = $getSubCategory;
    //         $data['meta_title'] = $getSubCategory->meta_title;
    //         $data['meta_description'] = $getSubCategory->meta_description;
    //         $data['meta_keywords'] = $getSubCategory->meta_keywords;
    //         return view('frontend.product.list', compact('data'));
    //     }
    //     else if(!empty($getCategory))
    //     {
    //         $data['getCategory'] = $getCategory;
    //         $data['meta_title'] = $getCategory->meta_title;
    //         $data['meta_description'] = $getCategory->meta_description;
    //         $data['meta_keywords'] = $getCategory->meta_keywords;
    //         return view('frontend.product.list', compact('data'));
    //     }
    //     else
    //     {
    //         abort(404);
    //     }
        
    // }


}
