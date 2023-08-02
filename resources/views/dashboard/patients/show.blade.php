@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between">
        <h3>Patient Information</h3>
        <button class="btn btn-warning">Edit</button>
    </div>
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                        <td>{{ $patient->fullName }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ $patient->phone }}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>{{ $patient->dob }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{ $patient->readableGender }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $patient->user->email }}</td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td>{{ $patient->address }}</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>{{ $patient->contact_name . ' ' . $patient->contact_phone }}</td>
                    </tr>
                </table>
                <div class="card-body">
                    <a href="{{ route('accounts.patients.edit', $patient->id) }}" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-edit"></i> Edit</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('dashboard/assets/img/icons/unicons/wallet.png') }}" alt="chart success" class="rounded">
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Upcoming Appointments</span>
                    <h3 class="card-title mb-2"></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">Appointment History</h5>
                <div class="table-responsive text-nowrap">
                    @if(count($appointments) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Service</th>
                            <th>Staff</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($appointments as $i => $appointment)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $appointment->date_time->format('Y-m-d') . ' at ' . $appointment->date_time->format('H:m:ia') }}</td>
                            <td>{{ $appointment->service->title }}</td>
                            <td>{{ $appointment->staff->full_name }}</td>
                            <td><span class="text-{{ $appointment->status_code }}">{{ ucfirst($appointment->status) }}</span></td>
                            <td>
                                <a href="{{ route('accounts.appointment.show', $appointment->id) }}" class="btn btn-dark">View</a>
                                <a href="{{ route('accounts.appointment.edit', $appointment->id) }}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                   @else
                        <p class="alert alert-info">There are no appointments for the selected patient.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">Admission History</h5>
                <div class="table-responsive text-nowrap">
                    @if($admissions->count() > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Staff</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($admissions as $i => $admission)
                            <tr>
                                <td>{{ $admission->admission_time->format('Y-m-d') }}</td>
                                <td>{{ $admission->staff->full_name }}</td>
                                <td>{{ $admission->admission_type }}</td>
                                <td><span class="text-{{ $admission->status_code }}">{{ ucfirst($admission->status) }}</span></td>
                                <td><a href="{{ route('accounts.admissions.show', $admission->id) }}" class="btn btn-dark">View</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <p class="alert alert-info">The selected patient has no admissions history</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(() => {

        })
    </script>
@endsection
