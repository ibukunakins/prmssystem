@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-3">
        <h3>{{ $company->name }}</h1>
        <button class="btn btn-danger">Generate PAYE</button>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4 order-0">
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
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="card-header bg-dark text-white">Company Allowances</div>
                @if ($company->allowances->count() > 0)
                    <table class="table table-bordered">
                        @foreach ($company->allowances as $allowance)
                            <tr>
                                <td>{{ $allowance->name }}</td>
                                <td>N{{ number_format($allowance->amount, 2) }}</td>
                                <td>
                                    <a href="{{ route('dashboard.clients.editAllowances', $allowance->id) }}" class="btn btn-sm btn-info">Edit</a>    
                                    {{-- <a href="{{ route('dashboard.clients.editAllowances', $allowance->id) }}" class="btn btn-sm btn-info">Activate</a>     --}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="card-body">
                        <div class="alert alert-info">You don't have any allowance set</div>
                    </div>
                @endif
                <div class="card-body">
                    <a href="{{ route('dashboard.clients.addAllowance', $company->id) }}" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-plus"></i> Add Allowance</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('dashboard.staffs.add', $company->id) }}" class="btn btn-primary">Add New Staff</a>
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
