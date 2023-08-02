@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-3">
        <h3>{{ $appointment->title }} Appointment</h1>
        <form id="submitApprovalForm" action="{{ route('accounts.appointments.cancel') }}" method="post">
            @csrf
            <input id="hiddenInput" type="hidden" name="id" value="{{ $appointment->id }}">
        </form>
        @if ($appointment->status != 'cancelled')
            <button class="btn btn-danger cancelBtn">Cancel Appointment</button>
            <button class="btn btn-success confirmBtn">Confirm Appointment</button>
        @endif
    </div>
    <div class="row">
        <div class="col-12 mb-4 order-0">
            <div class="card">
                <table class="table table-bordered">
                    <tr>
                        <td class="w-25">Patient Name</td>
                        <td>{{ $appointment->patient->full_name }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Staff Name</td>
                        <td>{{ $appointment->staff->full_name }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Staff Title</td>
                        <td>{{ $appointment->staff->title }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Service</td>
                        <td>{{ $appointment->service->title }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Department</td>
                        <td>{{ $appointment->service->department->name }}</td>
                    </tr>
                    <tr>
                        <td>Comment</td>
                        <td>{{ $appointment->comment }}</td>
                    </tr>
                    <tr>
                        <td>Date & Time</td>
                        <td>{{ $appointment->date_time->format('Y-m-d') . ' at ' . $appointment->date_time->format('H:m:ia') }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><span class="text-{{ $appointment->status_code }}">{{ ucfirst($appointment->status) }}</span></td>
                    </tr>
                </table>
                @if ($appointment->status != 'cancelled')
                    <div class="card-body">
                        <a href="{{ route('accounts.appointments.edit', $appointment->id) }}" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-edit"></i> Edit</a>
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
                    title: 'Cancel this appointment',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, confirm',
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
            $('.confirmBtn').on('click', (e) => {
                swal({
                    title: 'Confirm Appointment. Only confirm appointment when patient is sighted.',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, confirm',
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
