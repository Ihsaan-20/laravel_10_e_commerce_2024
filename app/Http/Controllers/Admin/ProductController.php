<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSize;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Product List';
        $data['products'] = Product::getProducts();
        return view('admin.product.list', compact('data'));
    }
    public function add()
    {
        $data['header_title'] = 'Add Product';
        $data['categories'] = Category::where('status', '1')
                                        ->where('is_deleted', 0)
                                        ->latest('created_at')
                                        ->get();
        $data['getSubCategoies'] = SubCategory::where('status', '1')
                                                ->where('is_deleted', 0)
                                                ->latest('created_at')
                                                ->get();
        $data['brands'] = Brand::where('status', '1')
                                ->where('is_deleted', 0)
                                ->latest('created_at')
                                ->get();
        $data['colors'] = Color::getColors();
        return view('admin.product.add', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'title' => 'required',
            'new_price' => 'required',
            'meta_title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'additional_info' => 'required',
            'shipping_returns' => 'required',
            'status' => 'required',
        ],[
            'name' => 'Sub Category name is required',
            'brand_id' => 'Brand name is required',
            'category_id' => 'Category name is required',
            'sub_category_id' => 'Sub Category name is required',
        ]);
        // dd($request->all());
        $product = new Product();
        $product->title = trim($request->title);
        $product->created_by = Auth::user()->id;
        $slug  = Str::slug($request->title, '-');
        $product->slug = trim($slug);
        $product->sku = trim("SKU-".$request->sku);
        $product->new_price = trim($request->new_price);
        $product->old_price = trim($request->old_price);
        $product->short_description = trim($request->short_description);
        $product->description = trim($request->description);
        $product->additional_info = trim($request->additional_info);
        $product->shipping_returns = trim($request->shipping_returns);
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->meta_title = trim($request->meta_title);
        $product->meta_description = trim($request->meta_description);
        $product->meta_keywords = trim($request->meta_keywords);
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();
        //product colors;
        if(!empty($request->color_id))
        {
            foreach($request->color_id as $color_id){
                $color = New ProductColor();
                $color->product_id =  $product->id;
                $color->color_id =  $color_id;
                $color->save();
            }
        }
        //product size;
        if (!empty($request->size)) {
            foreach ($request->size as $size) {
                if (!empty($size['name'])) {
                    $productSize = new ProductSize();
                    $productSize->product_id = $product->id;
                    $productSize->name = $size['name'];
                    $productSize->price = $size['price'];
                    $productSize->save();
                }
            }
        }  
        //upload images
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $randomStr = $product->id . Str::random(10);
                $original_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $size = $image->getSize();
                $filename = strtolower($randomStr) . '.' . $extension;
                $image->move(public_path('uploads/product_images'), $filename);
                $productImage = ProductImage::create([
                    'product_id' => $product->id,
                    'name' => $filename,
                    'original_name' => $original_name,
                    'image_path' => 'uploads/product_images/' . $filename, // Store the relative path
                    'size' => $size,
                    'extension' => $extension,
                ]);
            }
        }
        return redirect()->route('admin.product.edit', $product->id)->with('success', 'Product Created Successfully');
        
        
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Product';
        $product = Product::findOrFail($id);
        if(!empty($product)){
            $data['categories'] = Category::getCategories()->filter(function ($category) {
                return $category->status == 1;
            });
    
            $data['brands'] = Brand::getBrands()->filter(function ($brands) {
                return $brands->status == 1;
            });
    
            $data['colors'] = Color::getColors();
            $data['productColors'] = $product->getProductColor;
            $data['product'] = $product;
            $data['getSubCategoies'] = SubCategory::getSubCategoriesByCategoryId($product->category_id);
        }
        return view('admin.product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
       
        // $this->validate($request, [
        //     'brand_id' => 'required',
        //     'category_id' => 'required',
        //     'sub_category_id' => 'required',
        //     'title' => 'required',
        //     'slug' => 'unique:products,slug,'.$id,
        //     'sku' => 'nullable',
        //     'new_price' => 'required',
        //     'old_price' => 'required',
        //     'meta_title' => 'required',
        //     'short_description' => 'required',
        //     'description' => 'required',
        //     'additional_info' => 'required',
        //     'shipping_returns' => 'required',
        //     'status' => 'required',
        // ],[
        //     'name' => 'Sub Category name is required',
        //     'brand_id' => 'Brand name is required',
        //     'category_id' => 'Category name is required',
        //     'sub_category_id' => 'Sub Category name is required',
        // ]);

        $product = Product::findOrFail($id);
        $slug  = Str::slug($product->title, '-');
        if(!empty($product))
        {
            $product->title = trim($request->title);
            $product->slug = trim($slug);
            $product->sku = trim("SKU-".$request->sku);
            $product->new_price = trim($request->new_price);
            $product->old_price = trim($request->old_price);
            $product->title = trim($request->title);
            $product->short_description = trim($request->short_description);
            $product->description = trim($request->description);
            $product->additional_info = trim($request->additional_info);
            $product->shipping_returns = trim($request->shipping_returns);
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->meta_title = trim($request->meta_title);
            $product->meta_description = trim($request->meta_description);
            $product->meta_keywords = trim($request->meta_keywords);
            $product->status = $request->status;
            $product->category_id = $request->category_id;
            $product->updated_at = now();
            $product->save();
            //product colors;
            $oldColors = ProductColor::where('product_id', $id)->delete();
            if(!empty($request->color_id))
            {
                foreach($request->color_id as $color_id){
                    $color = New ProductColor();
                    $color->product_id =  $product->id;
                    $color->color_id =  $color_id;
                    $color->save();
                }
            }
            //product size;
            $oldProductSizes = ProductSize::where('product_id', $id)->delete();
            if (!empty($request->size)) {
                foreach ($request->size as $size) {
                    if (!empty($size['name'])) {
                        $productSize = new ProductSize();
                        $productSize->product_id = $product->id;
                        $productSize->name = $size['name'];
                        $productSize->price = $size['price'];
                        $productSize->save();
                    }
                }
            }  
            //upload images
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $image) {
                    $randomStr = $product->id . Str::random(10);
                    $original_name = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $size = $image->getSize();
                    $filename = strtolower($randomStr) . '.' . $extension;
                    
                    // Move the uploaded image to the storage directory
                    $image->move(public_path('uploads/product_images'), $filename);
            
                    // Save the product image details to the database
                    $productImage = ProductImage::create([
                        'product_id' => $product->id,
                        'name' => $filename,
                        'original_name' => $original_name,
                        'image_path' => 'uploads/product_images/' . $filename, // Store the relative path
                        'size' => $size,
                        'extension' => $extension,
                    ]);
                }
            }

        }
        
        return redirect()->route('admin.product.edit',$product->id)->with('success', 'Product Updated Successfully');
    }

    public function delete($id)
    {
        // $sub = Product::findOrFail($id);
        // if($sub)
        // {
        //     $sub->is_deleted = 1; // yes
        //     $sub->status = 0; // aslo status
        //     $sub->save();
        //     return redirect()->route('admin.product.list')->with('success', 'Sub Category Deleted Successfully');
        // }else
        // {
        //     return redirect()->route('admin.product.list')->with('not_found', 'Sub Category not found! Please try again');
        // }
    }

    public function deleteProductImage($id)
    {
        $image = ProductImage::findOrFail($id);
        if(!empty($image->getImageUrl()))
        {
            unlink('uploads/product_images/'.$image->name);
        }
        $image->delete();
        return redirect()->back()->with('success', 'Image Deleted Successfully');

    }

    public function productImageSort(Request $request)
    {
        // dd($request->all());
        if(!empty($request->image_id))
        {
            $i = 1;
            foreach($request->image_id as $image_id)
            {
                $image = ProductImage::findOrFail($image_id);
                $image->order_by = $i;
                $image->save();
                // dd($image);
                $i++;
            }
        }
        $json['success'] = true;
        echo json_encode($json);
    }

}
