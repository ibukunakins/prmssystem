<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function index()
    {
        $departments = Department::orderBy('name')->get();
        
        return view('dashboard.departments.index', compact('departments'));
    }
    
    function create()
    {
        return view('dashboard.departments.add');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->only('name');
        $data['code'] = rand(111, 999);

        Department::create($data);
        $this->sweetalert('success', 'Department added successfully');
        return redirect()->route('accounts.departments.index');
    }

    function edit($id)
    {
        $department = Department::find($id);
        
        return view('dashboard.departments.edit', compact('department'));
    }
    
    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $department = Department::find($id);
        $department->update([
            'name' => $request->name
        ]);
        
        $this->sweetalert('success', 'Department updated successfully');
        return redirect()->route('accounts.departments.index');
    }

    function destroy(Request $request)
    {
        $department = Department::find($request->input('id'));
        $department->delete();

        $this->sweetalert('success', 'Department deleted successfully');
        return redirect()->back();
    }
}
