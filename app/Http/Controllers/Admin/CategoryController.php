<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Category List';
        $data['categories'] = Category::getCategories();
        return view('admin.category.list', compact('data'));
    }
    public function add()
    {
        $data['header_title'] = 'Add Category';
        return view('admin.category.add', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'meta_title' => 'required',
        ],[
            'name' => 'Category name is required',
        ]);

        $category = Category::create([
            'name' => trim($request->name),
            'slug' => trim($request->slug),
            'meta_title' => trim($request->meta_title),
            'meta_description' =>trim($request->meta_description),
            'meta_keywords' =>trim($request->meta_keywords),
            'status' => $request->status,
            'created_by' => Auth::user()->id
        ]);
      

        if($category)
        {
            return redirect()->route('admin.category.list')->with('success', 'Category Created Successfully');
        }
        
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Category';
        $data['category'] = Category::findOrFail($id);
        return view('admin.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
            'meta_title' => 'required',
        ],[
            'name' => 'Category name is required',
        ]);

        $category = Category::findOrFail($id);
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->status = $request->status;
        $category->updated_at = now();
        $category->save();
        return redirect()->route('admin.category.list')->with('success', 'Category Updated Successfully');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        if($category)
        {
            $category->is_deleted = 1; // yes
            $category->status = 0; // aslo status
            $category->save();
            return redirect()->route('admin.category.list')->with('success', 'Category Deleted Successfully');
        }else
        {
            return redirect()->route('admin.category.list')->with('not_found', 'Category not found! Please try again');
        }
    }
}
