<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Sub Category List';
        $data['sub_categories'] = SubCategory::getSubCategories();
        return view('admin.sub_category.list', compact('data'));
    }
    public function add()
    {
        $data['header_title'] = 'Add Sub Category';
        $data['categories'] = Category::latest()->get();
        return view('admin.sub_category.add', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'meta_title' => 'required',
            'category_id' => 'required',
        ],[
            'name' => 'Sub Category name is required',
            'category_id' => 'Category name is required',
        ]);

        $subCategory = SubCategory::create([
            'name' => trim($request->name),
            'slug' => trim($request->slug),
            'meta_title' => trim($request->meta_title),
            'meta_description' =>trim($request->meta_description),
            'meta_keywords' =>trim($request->meta_keywords),
            'status' => $request->status,
            'category_id' => $request->category_id,
            'created_by' => Auth::user()->id
        ]);
      

        if($subCategory)
        {
            return redirect()->route('admin.sub_category.list')->with('success', 'Sub Category Created Successfully');
        }
        
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Category';
        $data['sub_category'] = SubCategory::findOrFail($id);
        $data['categories'] = Category::latest()->get();
        return view('admin.sub_category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
            'meta_title' => 'required',
        ],[
            'name' => 'Sub Category name is required',
            'category_id' => 'Category name is required',
        ]);

        $sub = SubCategory::findOrFail($id);
        $sub->name = trim($request->name);
        $sub->slug = trim($request->slug);
        $sub->meta_title = trim($request->meta_title);
        $sub->meta_description = trim($request->meta_description);
        $sub->meta_keywords = trim($request->meta_keywords);
        $sub->status = $request->status;
        $sub->category_id = $request->category_id;
        $sub->updated_at = now();
        $sub->save();
        return redirect()->route('admin.sub_category.list')->with('success', 'Sub Category Updated Successfully');
    }

    public function delete($id)
    {
        $sub = SubCategory::findOrFail($id);
        if($sub)
        {
            $sub->is_deleted = 1; // yes
            $sub->status = 0; // aslo status
            $sub->save();
            return redirect()->route('admin.sub_category.list')->with('success', 'Sub Category Deleted Successfully');
        }else
        {
            return redirect()->route('admin.sub_category.list')->with('not_found', 'Sub Category not found! Please try again');
        }
    }
}
