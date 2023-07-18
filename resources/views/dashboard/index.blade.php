@extends('layouts.dashboard')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}" alt="chart success" class="rounded">
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Today Sales</span>
                        <h3 class="card-title mb-2">&#8358;{{ number_format(30000,2) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}" alt="chart success" class="rounded">
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Today Invoices</span>
                        <h3 class="card-title mb-2">10</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}" alt="chart success" class="rounded">
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Clients</span>
                        <h3 class="card-title mb-2">10</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Employees</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S/n</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td><strong>Angular Project</strong></td>
                            <td>Albert Cook</td>
                            <td>
                                
                            </td>
                            <td><span class="badge bg-label-primary me-1">Active</span></td>
                            <td>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <!-- / Content -->
@endsection