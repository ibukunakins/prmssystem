@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between">
        <h3>{{ $company->name }}</h1>
        <button class="btn btn-danger">Generate PAYE</button>
    </div>
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                        <td>{{ $company->name }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ $company->phone }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $company->email }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $company->client->address }}</td>
                    </tr>
                </table>
                <div class="card-body">
                    <a href="{{ route('dashboard.clients.edit', $company->id) }}" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-edit"></i> Edit</a>
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
                    <span class="fw-semibold d-block mb-1">Total Revenues</span>
                    <h3 class="card-title mb-2">N120,000.00</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('dashboard.staffs.add') }}" class="btn btn-primary">Add New Staff</a>
            <a href="" class="btn btn-success">Upload Staff</a>
        </div>
        <h5 class="card-header">Employees</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>S/n</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Monthly Salary</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <td><strong>Angular Project</strong></td>
                        <td>
                            09090909
                        </td>
                        <td>N900,000.000</td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>N/A</td>
                    </tr>
                </tbody>
            </table>
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
