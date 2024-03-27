<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Color List';
        $data['colors'] = Color::getColors();
        return view('admin.color.list', compact('data'));
    }
    public function add()
    {
        $data['header_title'] = 'Add Color';
        return view('admin.color.add', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ],[
            'name' => 'Color name is required',
        ]);

        $color = Color::create([
            'name' => trim($request->name),
            'color_code' => trim($request->color_code),
            'status' => $request->status,
            'created_by' => Auth::user()->id
        ]);
      

        if($color)
        {
            return redirect()->route('admin.color.list')->with('success', 'Color Created Successfully');
        }
        
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Color';
        $data['color'] = Color::findOrFail($id);
        return view('admin.color.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required',
        ],[
            'name' => 'Color name is required',
        ]);

        $color = Color::findOrFail($id);
        $color->name = trim($request->name);
        $color->color_code = trim($request->color_code);
        $color->status = $request->status;
        $color->updated_at = now();
        $color->save();
        return redirect()->route('admin.color.list')->with('success', 'Color Updated Successfully');
    }

    public function delete($id)
    {
        $color = Color::findOrFail($id);
        if($color)
        {
            $color->is_deleted = 1; // yes
            $color->save();
            return redirect()->route('admin.color.list')->with('success', 'Color Deleted Successfully');
        }else
        {
            return redirect()->route('admin.color.list')->with('not_found', 'Color not found! Please try again');
        }
    }
}
