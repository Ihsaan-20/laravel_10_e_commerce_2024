<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['admins'] = User::getAdminList();
        $data['header_title'] = 'Admin List';
        return view('admin.admin.list', compact('data'));
    }
    public function add()
    {
        $data['header_title'] = 'Admin Add';
        return view('admin.admin.add', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 1,
            'status' => $request->status
        ]);
      

        if($user)
        {
            return redirect()->route('admin.admin.list')->with('success', 'Admin Added Successfully');
        }
        
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Admin';
        $data['admin'] = User::getSingleUser($id);
        return view('admin.admin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable',
        ]);

        $admin = User::findOrFail($id);
        if($admin)
        {
            $admin->name = $request->name;
            $admin->email = $request->email;
            if(!empty($request->password))
            {
                $admin->password = Hash::make( $request->password);
            }
            $admin->is_admin = 1;
            $admin->status = $request->status;
            $admin->updated_at = now();
            $admin->save();
            return redirect()->route('admin.admin.list')->with('success', 'Admin Updated Successfully');
        }
        

    }

    public function delete($id)
    {
        $admin = User::findOrFail($id);
        if($admin)
        {
            $admin->is_deleted = 1; // yes
            $admin->is_admin = 0; // change admin status
            $admin->status = 0; // aslo status
            $admin->save();
            return redirect()->route('admin.admin.list')->with('deleted', 'Admin Deleted Successfully');
        }else
        {
            return redirect()->route('admin.admin.list')->with('not_found', 'Admin not found! Please try again');
        }
    }


}
