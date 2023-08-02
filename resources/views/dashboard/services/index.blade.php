@extends('layouts.dashboard')

@section('css')
@include('partials.dashboard.datatable_css')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="mb-2">
    <h1 class="text-3xl font-bold">All Departments</h1>
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
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $index => $value)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }} min(s)</td>
                            <td>{{ $value->duration }}</td>
                            <td>{{ $value->department ? $value->department->name : 'N/A' }}</td>
                            <td class="d-flex">
                                <form id="submitApprovalForm" action="{{ route('accounts.services.destroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input id="hiddenInput" type="hidden" name="id">
                                </form>
                                <a href="{{ route('accounts.services.edit', $value->id) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                                <button data-id="{{ $value->id }}" class="btn btn-danger btn-sm deleteBtn">Delete</button>
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
