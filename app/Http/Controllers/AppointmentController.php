<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    function index()
    {
        $appointments = Appointment::orderBy('date_time', 'ASC')->get();

        return view('dashboard.appointments.index', compact('appointments'));    
    }

    public function create()
    {
        $patients = Patient::orderBy('first_name')->get();
        $staff = Staff::orderBy('first_name')->get();
        $services = Service::orderBy('title')->get();
        
        return view('dashboard.appointments.add', compact('staff', 'patients', 'services'));
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:8',
            'staff_id' => 'required',
            'patient_id' => 'required',
            'date_time' => 'required',
            'service_id' => 'required',
            'comment' => 'required',
        ]);

        Appointment::create($request->except('_token'));
        $this->sweetalert('success', 'New appointment scheduled');
        return redirect()->route('accounts.appointments.index');
    }

    function show($id)
    {
        $appointment = Appointment::with('patient', 'staff', 'service.department')->find($id);
        
        return view('dashboard.appointments.show', compact('appointment'));
    }

    function edit($id)
    {
        $appointment = Appointment::find($id);
        $patients = Patient::orderBy('first_name')->get();
        $staff = Staff::orderBy('first_name')->get();
        $services = Service::orderBy('title')->get();

        return view('dashboard.appointments.edit', compact('staff', 'patients', 'services', 'appointment'));
    }
    
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:8',
            'staff_id' => 'required',
            'patient_id' => 'required',
            'date_time' => 'required',
            'service_id' => 'required',
            'comment' => 'required',
        ]);
        $appointment = Appointment::find($id);
        $appointment->update($request->except(['_token', '_method']));
        
        $this->sweetalert('success', 'Appointment updated successfully');
        return redirect()->route('accounts.appointments.index');
    }

    function destroy(Request $request)
    {
        $appointment = Appointment::find($request->input('id'));
        $appointment->delete();

        $this->sweetalert('success', 'Appointment deleted successfully');
        return redirect()->back();
    }

    function cancel(Request $request)
    {
        $appointment = Appointment::find($request->input('id'));
        
        $appointment->status = 'cancelled';
        $appointment->save();

        $this->sweetalert('success', 'Appointment cancelled successfully');
        return redirect()->back();
    }
}
