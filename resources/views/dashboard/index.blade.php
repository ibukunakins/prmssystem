@extends('layouts.dashboard')

@section('css')
    @include('partials.dashboard.datatable_css')
@endsection

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        
                        <span class="fw-semibold d-block mb-1">Total Patients</span>
                        <h3 class="card-title mb-2">{{ $patients }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-semibold d-block mb-1">Total Admissions</span>
                        <h3 class="card-title mb-2">{{ $admissions }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-semibold d-block mb-1">Total Staff</span>
                        <h3 class="card-title mb-2">{{ $staff }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="d-flex card-header justify-content-between">
                <h5 class="">Today's Appointments</h5>
                <input type="text" id="mySearchText" placeholder="">
            </div>
            <div class="table-responsive text-nowrap">
                <table id="table__data" class="table table-hover">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Appointment Title</th>
                            <th>Patient</th>
                            <th>Staff</th>
                            <th>Staff Designation</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($appointments as $index => $appointment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $appointment->title }}</td>
                                <td>{{ $appointment->patient->full_name }}</td>
                                <td>{{ $appointment->staff->full_name }}</td>
                                <td>{{ $appointment->staff->title }}</td>
                                <td><span class="badge bg-label-{{ $appointment->statusCode }} me-1">{{ $appointment->status }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

@section('scripts')
    @include('partials.dashboard.datatable_scripts')
@endsection