@extends('layouts.dashboard')

@section('css')
@include('partials.dashboard.datatable_css')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @include('partials._errors')
<div class="mb-2">
    <h1 class="text-3xl font-bold">All Admissions</h1>
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
                            <th>Patient</th>
                            <th>Admission Type</th>
                            <th>Admission Time</th>
                            <th>Ward</th>
                            <th>Room</th>
                            <th>Staff</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($admissions as $index => $admission)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $admission->patient->full_name }}</td>
                                <td>{{ $admission->admission_type }}</td>
                                <td>{{ $admission->admission_time }}</td>
                                <td>{{ $admission->ward_no }}</td>
                                <td>{{ $admission->room_no }}</td>
                                <td>{{ $admission->staff->full_name }}</td>
                                <td><span class="badge bg-label-{{ $admission->statusCode }} me-1">{{ $admission->status }}</span></td>
                                <td class="d-flex">
                                    <form id="submitApprovalForm" action="{{ route('accounts.admissions.destroy') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input id="hiddenInput" type="hidden" name="id">
                                    </form>
                                    <a href="{{ route('accounts.admissions.show', $admission->id) }}" class="btn btn-dark btn-sm mr-2">View</a>
                                    @if ($admission->status != 'cancelled')
                                    <a href="{{ route('accounts.admissions.edit', $admission->id) }}" class="btn btn-info btn-sm mr-2">Edit</a>
                                    @endif
                                    <button data-id="{{ $admission->id }}" class="btn btn-danger btn-sm deleteBtn">Delete</button>
                                </td>
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