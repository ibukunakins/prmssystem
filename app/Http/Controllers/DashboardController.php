<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() 
    {
        $patients = Patient::count();
        $staff = Staff::count();
        $admissions = Admission::count();
        $appointments = Appointment::with('patient', 'staff')->whereBetween('date_time', [now()->startOfDay(), now()->endOfDay()])->get();

        return view('dashboard.index', compact('patients', 'admissions', 'staff', 'appointments'));
    }
}
