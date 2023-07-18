<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    function index()
    {
        $staff = Staff::with('department')->orderBy('first_name')->get(); 
        
        return view('dashboard.staffs.index', compact('staff'));
    }

    function create()
    {
        $departments = Department::orderBy('name')->get();
        return view('dashboard.staffs.add', compact('departments'));
    }

    function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'title' => 'required',
            'department_id' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name,
            'email' => $request->email,
            'role_id' => 5,
            'password' => bcrypt(12345),
            'email_verified_at' => now(),
            'username' => rand(1111111,99999999)
        ]);

        $data = $request->except('_token');
        $data['user_id'] = $user->id;
        Staff::create($data);

        $this->sweetalert('success', 'New staff successfully');
        return redirect()->back();
    }

    function edit($id)
    {
        $staff = Staff::find($id);
        $departments = Department::orderBy('name')->get();
        return view('dashboard.staffs.edit', compact('staff', 'departments'));
    }

    function update(Request $request, $id)
    {
        // return $request->all();
        $staff = Staff::find($id);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users,email,' . $staff->user_id,
            'marital_status' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'title' => 'required',
            'department_id' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
        $staff->update($request->except(['_method', '_token']));

        $this->sweetalert('success', 'Staff updated successfully');
        return redirect()->route('accounts.staff.index');
    }

    function destroy(Request $request)
    {
        $staff = Staff::with('user')->find($request->input('id'));
        $staff->user()->delete();
        $staff->delete();

        $this->sweetalert('success', 'Staff deleted successfully');
        return redirect()->back();
    }
}
