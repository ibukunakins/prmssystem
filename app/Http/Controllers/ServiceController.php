<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function index()
    {
        $services = Service::with('department')->orderBy('title')->get();
        
        return view('dashboard.services.index', compact('services'));
    }
    
    function create()
    {
        $departments = Department::orderBy('name')->select('id', 'name')->get();

        return view('dashboard.services.add', compact('departments'));
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'department_id' => 'required',
        ]);

        $data = $request->except('_token');

        Service::create($data);
        $this->sweetalert('success', 'Service added successfully');
        return redirect()->route('accounts.services.index');
    }

    function edit($id)
    {
        $service = Service::find($id);
        $departments = Department::orderBy('name')->select('id', 'name')->get();
        return view('dashboard.services.edit', compact('service', 'departments'));
    }
    
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'department_id' => 'required',
        ]);
        $service = Service::find($id);
        $service->update($request->only(['title','description','duration','department_id']));
        
        $this->sweetalert('success', 'Service updated successfully');
        return redirect()->route('accounts.services.index');
    }

    function destroy(Request $request)
    {
        $service = Service::find($request->input('id'));
        $service->delete();

        $this->sweetalert('success', 'Service deleted successfully');
        return redirect()->back();
    }
}
