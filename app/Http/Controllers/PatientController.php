<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    function index()
    {
        $patients = Patient::orderBy('first_name')->get(); 
        
        return view('dashboard.patients.index', compact('patients'));
    }

    function create()
    {
        return view('dashboard.patients.add');
    }

    function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'title' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        $data = $request->except('_token');
        $data['user_id'] = auth()->id();
        Patient::create($data);

        $this->sweetalert('success', 'New patient successfully');
        return redirect()->back();
    }

    function edit($id)
    {
        $patient = Patient::find($id);
        
        return view('dashboard.patients.edit', compact('patient'));
    }

    function update(Request $request, $id)
    {
        // return $request->all();
        $patient = Patient::find($id);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'title' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
        $patient->update($request->except(['_method', '_token']));

        $this->sweetalert('success', 'Patient updated successfully');
        return redirect()->route('accounts.patients.index');
    }

    function destroy(Request $request)
    {
        $patient = Patient::with('user')->find($request->input('id'));
        $patient->user()->delete();
        $patient->delete();

        $this->sweetalert('success', 'Patient deleted successfully');
        return redirect()->back();
    }
}
