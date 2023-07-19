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
            'description' => 'required',
        ]);

        Appointment::create($request->except('_token'));
        $this->sweetalert('success', 'New appointment scheduled');
        return redirect()->route('accounts.appointments.index');
    }
}
