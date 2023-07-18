@extends('layouts.dashboard')

@section('css')
@include('partials.dashboard.datatable_css')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="mb-2">
    <h1 class="text-3xl font-bold">All Companies</h1>
    <span class="dashboard__title__line"></span>
</div>

<div class="row">
    <div class="col-xl-12 mx-auto">        
        <div class="card">
            <div class="card-body">                
                <table id="report_datatable" class="table table-bordered table-striped" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Phone No</th>
                        <th>Address</th>
                        <th>Number of Staff</th>
                        <th>Action</th>
                    </tr>
                </thead>
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
        $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#report_datatable').DataTable({
            processing: true,
            serverSide: true,
            'pageLength': 20,
            ajax: {
                'url': "{{url('dashboard/clients/indexApi')}}",
            },
            'columns': [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'staffs',
                    name: 'staffs'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ],
            order: [
                [0, 'desc']
            ],
            
        });
    });

    $('#btnFilterSearch').click(function () {
        $('#report_datatable').DataTable().draw(true);
    });
    </script>
@endsection