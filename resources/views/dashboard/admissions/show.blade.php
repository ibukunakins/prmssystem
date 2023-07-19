@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-3">
        <h3>Admission Details</h1>
        <form id="submitApprovalForm" action="{{ route('accounts.admissions.discharged') }}" method="post">
            @csrf
            <input id="hiddenInput" type="hidden" name="id" value="{{ $admission->id }}">
        </form>
        @if ($admission->status != 'discharged')
            <button class="btn btn-danger cancelBtn">Discharge Patient</button>
        @endif
    </div>
    <div class="row">
        <div class="col-12 mb-4 order-0">
            <div class="card">
                <table class="table table-bordered">
                    <tr>
                        <td class="w-25">Patient Name</td>
                        <td>{{ $admission->patient->full_name }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Admitted By</td>
                        <td>{{ $admission->staff->full_name }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Admission Type</td>
                        <td>{{ $admission->admission_type }}</td>
                    </tr>
                    <tr>
                        <td>Time Admitted</td>
                        <td>{{ $admission->admission_time->format('Y-m-d') . ' at ' . $admission->admission_time->format('H:m:ia') }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Ward Number</td>
                        <td>{{ $admission->ward_no }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Room Number</td>
                        <td>{{ $admission->room_no }}</td>
                    </tr>
                    <tr>
                        <td>Comment</td>
                        <td>{{ $admission->comment }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><span class="text-{{ $admission->status_code }}">{{ $admission->status }}</span></td>
                    </tr>
                </table>
                @if ($admission->status != 'discharged')
                    <div class="card-body">
                        <a href="{{ route('accounts.admissions.edit', $admission->id) }}" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-edit"></i> Edit</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            $('.cancelBtn').on('click', (e) => {
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
        })
    </script>
@endsection
