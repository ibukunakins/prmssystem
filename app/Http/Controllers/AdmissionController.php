<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    function index()
    {
        $admissions = Admission::with('patient', 'staff')->orderBy('created_at', 'ASC')->get();

        return view('dashboard.admissions.index', compact('admissions'));    
    }

    public function create()
    {
        $patients = Patient::orderBy('first_name')->get();
        
        return view('dashboard.admissions.add', compact('patients'));
    }

    function store(Request $request)
    {
        $request->validate([
            'ward_no' => 'required',
            'room_no' => 'required',
            'patient_id' => 'required',
            'admission_type' => 'required',
            'comment' => 'required',
        ]);

        $data = $request->except('_token');
        $data['admission_time'] = now();
        $data['staff_id'] = auth()->id();

        Admission::create($data);
        $this->sweetalert('success', 'New patient admitted');
        return redirect()->route('accounts.admissions.index');
    }

    function show($id)
    {
        $admission = Admission::with('patient', 'staff')->find($id);
        
        return view('dashboard.admissions.show', compact('admission'));
    }

    function edit($id)
    {
        $admission = Admission::find($id);
        $patients = Patient::orderBy('first_name')->get();

        return view('dashboard.admissions.edit', compact('patients', 'admission'));
    }
    
    function update(Request $request, $id)
    {
        $request->validate([
            'ward_no' => 'required',
            'room_no' => 'required',
            'patient_id' => 'required',
            'admission_type' => 'required',
            'comment' => 'required',
        ]);
        $admission = Admission::find($id);
        $admission->update($request->except(['_token', '_method']));
        
        $this->sweetalert('success', 'Admission updated successfully');
        return redirect()->route('accounts.admissions.index');
    }

    function destroy(Request $request)
    {
        $admissions = Admission::find($request->input('id'));
        $admissions->delete();

        $this->sweetalert('success', 'Admission deleted successfully');
        return redirect()->back();
    }

    function discharged(Request $request)
    {
        $admissions = Admission::find($request->input('id'));
        
        $admissions->status = 'discharged';
        $admissions->save();

        $this->sweetalert('success', 'Admission discharged successfully');
        return redirect()->back();
    }
}
