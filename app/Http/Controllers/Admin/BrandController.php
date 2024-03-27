<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Brand List';
        $data['brands'] = Brand::getBrands();
        return view('admin.brand.list', compact('data'));
    }
    public function add()
    {
        $data['header_title'] = 'Add Brand';
        return view('admin.brand.add', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'meta_title' => 'required',
        ],[
            'name' => 'Brand name is required',
        ]);

        $brand = Brand::create([
            'name' => trim($request->name),
            'slug' => trim($request->slug),
            'meta_title' => trim($request->meta_title),
            'meta_description' =>trim($request->meta_description),
            'meta_keywords' =>trim($request->meta_keywords),
            'status' => $request->status,
            'created_by' => Auth::user()->id
        ]);
      

        if($brand)
        {
            return redirect()->route('admin.brand.list')->with('success', 'Brand Created Successfully');
        }
        
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Brand';
        $data['brand'] = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
            'meta_title' => 'required',
        ],[
            'name' => 'Brand name is required',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);
        $brand->status = $request->status;
        $brand->updated_at = now();
        $brand->save();
        return redirect()->route('admin.brand.list')->with('success', 'Brand Updated Successfully');
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        if($brand)
        {
            $brand->is_deleted = 1; // yes
            $brand->status = 0; // aslo status
            $brand->save();
            return redirect()->route('admin.brand.list')->with('success', 'Brand Deleted Successfully');
        }else
        {
            return redirect()->route('admin.brand.list')->with('not_found', 'Brand not found! Please try again');
        }
    }
}
