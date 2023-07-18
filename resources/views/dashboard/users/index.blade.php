@extends('layouts.dashboard')

@section('css')
@include('partials.dashboard.datatable_css')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="mb-2">
    <h1 class="text-3xl font-bold">{{ $title }}</h1>
    <span class="dashboard__title__line"></span>
</div>
<section class="pb-3">
    <div class="card" >
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                    <div class="col-12 col-lg-6">
                        @if (hasPermission($user, 'create.user'))
                            <a href="{{ route('dashboard.users.add') }}" class="btn btn-success mb-75 waves-effect waves-float waves-light">Add New User</a>
                        @endif
                    </div>
                    <div class="col-12 col-lg-6 pl-xl-75 pl-0">
                        <div class="dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap">
                            <div class="mr-1">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label class="mt-0"><input id="mySearchText" type="search" placeholder="Search..." aria-controls="DataTables_Table_0" class="form-control" /></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <table id="table__data" class="table">
                        <thead>
                            <tr>
                                <th class="font-semibold text-black">S/N</th>
                                <th class="font-semibold text-black">Name</th>
                                <th class="font-semibold text-black">Phone</th>
                                <th class="font-semibold text-black">Email</th>
                                <th class="font-semibold text-black">Role</th>
                                <th class="font-semibold text-black">Added By</th>
                                <th class="font-semibold text-black">Activation Status</th>
                                @if (hasPermission($user, ['edit.user', 'delete.user']))
                                    <th class="font-semibold text-black">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $value)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $value->name }}
                                    </td>
                                    <td class="{{ $value->phone ? '' : 'text-danger' }}">{{ $value->phone ?? 'Not Available' }}</td>
                                    <td class="{{ $value->email ? '' : 'text-danger' }}">{{ $value->email ?? 'Not Available' }}</td>
                                    <td>{{ $value->role->name }}</td>
                                    <td>{{ $value->addedBy ? $value->addedBy->name : 'N/A' }}</td>
                                    <td>
                                        @if ($value->isActive == 1)
                                            <span class="con-vs-chip ag-grid-cell-chip con-color light-success mr-1">
                                                <span class="text-chip vs-chip--text">Active</span>
                                            </span>
                                        @else
                                            <span class="con-vs-chip ag-grid-cell-chip con-color light-danger mr-1">
                                                <span class="text-chip vs-chip--text">Not Active</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="flex">
                                        @if ($value->role->slug != 'super-admin')
                                            <a href="{{ route('dashboard.users.edit', $value->id) }}" class="btn btn-info mr-1 btn-sm" title="Edit">Edit</a>
                                            <form action="{{ route('dashboard.users.activation') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $value->id }}">
                                                @if ($value->isActive == 0)                                                
                                                    <button type="submit" class="btn btn-success mr-1 btn-sm" >Activate</button>
                                                @else
                                                    <button type="submit" class="btn btn-danger mr-1 btn-sm" >Deactivate</button>
                                                @endif
                                            </form>
                                            <button class="btn btn-dark btn-sm permissionModalButton" data-title="User Permissions" data-permissions="{{ json_encode($value->permissions) }}">View</button>
                                        @endif 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissionModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex flex-wrap text-capitalize" id="permissionDisplay">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@section('scripts')
    @include('partials.dashboard.datatable_scripts')
    <script>
        $(document).ready(function() {
            $('.permissionModalButton').click(function(e) {
                $('#permissionModal').modal('show');
                $('#permissionModalLabel').text($(e.target).data('title'))
                $('#permissionDisplay').html('')
                const permissions = $(e.target).data('permissions')
                let output = '';
                if(permissions) {
                    permissions.forEach((element, index) => {
                        let permission = element.split('.').join(' ')
                        output += `
                            <span class="mr-3 mb-2">${index + 1}. ${permission}</span>
                        `
                    })
                }
                $('#permissionDisplay').html(output)
            })
        })
    </script>
@endsection