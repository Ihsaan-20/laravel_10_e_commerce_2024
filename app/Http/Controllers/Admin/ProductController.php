<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Product List';
        $data['products'] = Product::all();
        return view('admin.product.list', compact('data'));
    }
    public function add()
    {
        $data['header_title'] = 'Add Product';
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        return view('admin.product.add', compact('data'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'slug' => 'required|unique:categories,slug',
        //     'meta_title' => 'required',
        //     'category_id' => 'required',
        // ],[
        //     'name' => 'Sub Category name is required',
        //     'category_id' => 'Category name is required',
        // ]);

        // $Product = Product::create([
        //     'name' => trim($request->name),
        //     'slug' => trim($request->slug),
        //     'meta_title' => trim($request->meta_title),
        //     'meta_description' =>trim($request->meta_description),
        //     'meta_keywords' =>trim($request->meta_keywords),
        //     'status' => $request->status,
        //     'category_id' => $request->category_id,
        //     'created_by' => Auth::user()->id
        // ]);
      

        // if($Product)
        // {
        //     return redirect()->route('admin.product.list')->with('success', 'Sub Category Created Successfully');
        // }
        
    }

    public function edit($id)
    {
        // $data['header_title'] = 'Edit Product';
        // $data['sub_category'] = Product::findOrFail($id);
        // $data['categories'] = Category::latest()->get();
        // $data['sub_categories'] = SubCategory::latest()->get();
        // return view('admin.product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'slug' => 'required|unique:categories,slug,'.$id,
        //     'meta_title' => 'required',
        // ],[
        //     'name' => 'Sub Category name is required',
        //     'category_id' => 'Category name is required',
        // ]);

        // $sub = Product::findOrFail($id);
        // $sub->name = trim($request->name);
        // $sub->slug = trim($request->slug);
        // $sub->meta_title = trim($request->meta_title);
        // $sub->meta_description = trim($request->meta_description);
        // $sub->meta_keywords = trim($request->meta_keywords);
        // $sub->status = $request->status;
        // $sub->category_id = $request->category_id;
        // $sub->updated_at = now();
        // $sub->save();
        // return redirect()->route('admin.product.list')->with('success', 'Sub Category Updated Successfully');
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
}
