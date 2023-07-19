@extends('layouts.dashboard')

@section('css')
@include('partials.dashboard.datatable_css')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="mb-2">
    <h1 class="text-3xl font-bold">All Appointments</h1>
    <span class="dashboard__title__line"></span>
</div>

<div class="row">
    <div class="col-xl-12 mx-auto">        
        <div class="card">
            <div class="card-body">    
                <div class="d-flex card-header justify-content-end">
                    <input type="text" id="mySearchText" placeholder="">
                </div>            
                <table id="table__data" class="table table-bordered table-striped" cellspacing="0"
                width="100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Appointment Title</th>
                            <th>Patient</th>
                            <th>Staff</th>
                            <th>Staff Designation</th>
                            <th>Date</th>
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
                                <td>{{ $appointment->date_time }}</td>
                                <td><span class="badge bg-label-{{ $appointment->statusCode }} me-1">{{ $appointment->status }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
    @include('partials.dashboard.datatable_scripts')

    <script>
        
        $('.deleteBtn').on('click', (e) => {            
            const id = $(e.target).attr('data-id')
            $('#hiddenInput').val(id)
            
            swal({
                title: 'Are you sure?',                
                showCancelButton: true,
                confirmButtonText: 'Yes, delete',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                
            }).then((result) => {
                if (result) {
                    $('#submitApprovalForm').submit()
                } else {
                    swal({
                        title: 'Cancelled'
                    })
                }
            })
            .catch(error => {
                swal({
                    title: 'Cancelled'
                })
            })
        })
    </script>
@endsection