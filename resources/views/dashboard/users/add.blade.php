@extends('layouts.dashboard')

@section('content')
<section class="col-lg-7 w-full mx-auto">
    @include('partials._errors')
    <div class="card" >
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 text-lg font-bold">{{ $title }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.users.store') }}">
                @csrf
                <div class="form__group">
                    <label for="name">Name<span class="text-red-500">*</span></label>
                    <input value="{{ old('name') }}" name="name" required type="text" id="name" class="form__control" placeholder="Enter name">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid lg:grid-cols-2 gap-x-4">
                    <div class="form__group">
                        <label for="phone">Phone Number<span class="text-red-500">*</span></label>
                        <input value="{{ old('phone') }}" minlength="11" maxlength="11" name="phone" required type="text" id="phone" class="form__control" placeholder="Enter phone number">
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form__group">
                        <label for="email">Email Address<span class="text-red-500">*</span></label>
                        <input value="{{ old('email') }}" required name="email" type="email" id="email" class="form__control" placeholder="Enter email address">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-x-4">                    
                    <div class="form__group">
                        <label for="role">Role<span class="text-red-500">*</span></label>
                        <select name="role_id" id="role" class="form__control">
                            <option value="">Choose option</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div id="permission_section" class="form__group d-none">
                    <h1 class="mb-2 font-bold text-lg">Choose Permission(s)</h1>
                    
                    @foreach ($permissions as $index => $permission)                        
                        <div class="mb-2">
                            <div class="flex justify-between border-b mb-2">
                                <h1 class="mb-0 font-semibold">{{ $index }} Permissions</h1>
                            </div>
                            <div class="d-flex flex-wrap">
                                @foreach ($permission as $value)                                    
                                    <div class="mr-2">
                                        <input {{ in_array($value->slug, old('permissions') ?? []) ? 'checked' : '' }} id="permission-{{ $value }}" value="{{ $value->slug }}" type="checkbox" name="permissions[]">
                                        <label for="permission-{{ $value }}" class="font-medium cursor-pointer" style="font-weight:400">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>        
                <div id="mla_section" class="form__group d-none">
                    <h1 class="mb-2 font-bold text-lg">Choose Permission(s)</h1>
                    
                    @foreach ($defaultPlatePermissions as $index => $permission)                        
                        <div class="mb-2">
                            <div class="flex justify-between border-b mb-2">
                                <h1 class="mb-0 font-semibold">{{ $index }} Permissions</h1>
                            </div>
                            <div class="d-flex flex-wrap">
                                @foreach ($permission as $value)                                    
                                    <div class="mr-2">
                                        <input {{ in_array($value->slug, $getMLAPermissions) ? 'checked' : '' }} id="mlapermission-{{ $value }}" value="{{ $value->slug }}" type="checkbox" name="mla_permissions[]">
                                        <label for="mlapermission-{{ $value }}" class="font-medium cursor-pointer" style="font-weight:400">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>        
                <div id="admin_section" class="form__group d-none">
                    <h1 class="mb-2 font-bold text-lg">Choose Permission(s)</h1>
                    
                    @foreach ($permissions as $index => $permission)                        
                        <div class="mb-2">
                            <div class="flex justify-between border-b mb-2">
                                <h1 class="mb-0 font-semibold">{{ $index }} Permissions</h1>
                            </div>
                            <div class="d-flex flex-wrap">
                                @foreach ($permission as $value)                                    
                                    <div class="mr-2">
                                        <input {{ in_array($value->slug, $getAdminPermissions) ? 'checked' : '' }} id="adminpermission-{{ $value }}" value="{{ $value->slug }}" type="checkbox" name="admin_permissions[]">
                                        <label for="adminpermission-{{ $value }}" class="font-medium cursor-pointer" style="font-weight:400">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>        
                <div id="store_section" class="form__group d-none">
                    <h1 class="mb-2 font-bold text-lg">Choose Permission(s)</h1>
                    
                    @foreach ($defaultPlatePermissions as $index => $permission)                        
                        <div class="mb-2">
                            <div class="flex justify-between border-b mb-2">
                                <h1 class="mb-0 font-semibold">{{ $index }} Permissions</h1>
                            </div>
                            <div class="d-flex flex-wrap">
                                @foreach ($permission as $value)                                    
                                    <div class="mr-2">
                                        <input {{ in_array($value->slug, $getStorePermissions) ? 'checked' : '' }} id="storepermission-{{ $value }}" value="{{ $value->slug }}" type="checkbox" name="store_permissions[]">
                                        <label for="storepermission-{{ $value }}" class="font-medium cursor-pointer" style="font-weight:400">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>        
                <div id="account_section" class="form__group d-none">
                    <h1 class="mb-2 font-bold text-lg">Choose Permission(s)</h1>
                    
                    @foreach ($defaultPlatePermissions as $index => $permission)                        
                        <div class="mb-2">
                            <div class="flex justify-between border-b mb-2">
                                <h1 class="mb-0 font-semibold">{{ $index }} Permissions</h1>
                            </div>
                            <div class="d-flex flex-wrap">
                                @foreach ($permission as $value)                                    
                                    <div class="mr-2">
                                        <input {{ in_array($value->slug, $getAccountPermissions) ? 'checked' : '' }} id="accountpermission-{{ $value }}" value="{{ $value->slug }}" type="checkbox" name="account_permissions[]">
                                        <label for="accountpermission-{{ $value }}" class="font-medium cursor-pointer" style="font-weight:400">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>        
                <div id="chairman_section" class="form__group d-none">
                    <h1 class="mb-2 font-bold text-lg">Choose Permission(s)</h1>
                    
                    @foreach ($defaultPlatePermissions as $index => $permission)                        
                        <div class="mb-2">
                            <div class="flex justify-between border-b mb-2">
                                <h1 class="mb-0 font-semibold">{{ $index }} Permissions</h1>
                            </div>
                            <div class="d-flex flex-wrap">
                                @foreach ($permission as $value)                                    
                                    <div class="mr-2">
                                        <input {{ in_array($value->slug, $getChairmanPermissions) ? 'checked' : '' }} id="chairpermission-{{ $value }}" value="{{ $value->slug }}" type="checkbox" name="chairman_permissions[]">
                                        <label for="chairpermission-{{ $value }}" class="font-medium cursor-pointer" style="font-weight:400">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>        
                <div id="approval_section" class="form__group d-none">
                    <h1 class="mb-2 font-bold text-lg">Choose Permission(s)</h1>
                    
                    @foreach ($defaultPlatePermissions as $index => $permission)                        
                        <div class="mb-2">
                            <div class="flex justify-between border-b mb-2">
                                <h1 class="mb-0 font-semibold">{{ $index }} Permissions</h1>
                            </div>
                            <div class="d-flex flex-wrap">
                                @foreach ($permission as $value)                                    
                                    <div class="mr-2">
                                        <input {{ in_array($value->slug, $getApprovalPermissions) ? 'checked' : '' }} id="chairpermission-{{ $value }}" value="{{ $value->slug }}" type="checkbox" name="approval_permissions[]">
                                        <label for="chairpermission-{{ $value }}" class="font-medium cursor-pointer" style="font-weight:400">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>        
                <div class="mt-2">
                    <button type="submit" class="btn btn-success text-white btn-block">
                        Add User
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            // $('#permission_section').hide()
            const roles = {!! json_encode($roles) !!}
            
            $('#role').on('change', (e) => {
                const value = $(e.target).val()

                if(value == '') {
                    $('#permission_section').addClass('d-none')
                    $('#store_section').addClass('d-none')
                    $('#admin_section').addClass('d-none')
                    $('#mla_section').addClass('d-none')
                    $('#chairman_section').addClass('d-none')
                    $('#approval_section').addClass('d-none')
                    $('#account_section').addClass('d-none')
                    return
                }

                let role = roles.find(role => role.id == value)
                
                if(role.slug == 'data-entry') {
                    // Show permissions
                    $('#permission_section').removeClass('d-none')
                    $('#store_section').addClass('d-none')
                    $('#admin_section').addClass('d-none')
                    $('#mla_section').addClass('d-none')
                    $('#chairman_section').addClass('d-none')
                    $('#approval_section').addClass('d-none')
                    $('#account_section').addClass('d-none')
                }
                if(role.slug == 'admin') {
                    // Show permissions
                    $('#permission_section').addClass('d-none')
                    $('#store_section').addClass('d-none')
                    $('#admin_section').removeClass('d-none')
                    $('#mla_section').addClass('d-none')
                    $('#chairman_section').addClass('d-none')
                    $('#approval_section').addClass('d-none')
                    $('#account_section').addClass('d-none')
                }
                if(role.slug == 'mla') {
                    // Show permissions
                    $('#permission_section').addClass('d-none')
                    $('#store_section').addClass('d-none')
                    $('#admin_section').addClass('d-none')
                    $('#mla_section').removeClass('d-none')
                    $('#chairman_section').addClass('d-none')
                    $('#approval_section').addClass('d-none')
                    $('#account_section').addClass('d-none')
                }
                if(role.slug == 'chairman') {
                    // Show permissions
                    $('#permission_section').addClass('d-none')
                    $('#store_section').addClass('d-none')
                    $('#admin_section').addClass('d-none')
                    $('#mla_section').addClass('d-none')
                    $('#chairman_section').removeClass('d-none')
                    $('#account_section').addClass('d-none')
                    $('#approval_section').addClass('d-none')
                }
                if(role.slug == 'store') {
                    // Show permissions
                    $('#permission_section').addClass('d-none')
                    $('#store_section').removeClass('d-none')
                    $('#admin_section').addClass('d-none')
                    $('#mla_section').addClass('d-none')
                    $('#chairman_section').addClass('d-none')
                    $('#approval_section').addClass('d-none')
                    $('#account_section').addClass('d-none')
                }
                if(role.slug == 'super-admin') {
                    // Show permissions
                    $('#permission_section').addClass('d-none')
                    $('#store_section').addClass('d-none')
                    $('#admin_section').addClass('d-none')
                    $('#mla_section').addClass('d-none')
                    $('#chairman_section').addClass('d-none')
                    $('#approval_section').addClass('d-none')
                    $('#account_section').addClass('d-none')
                }
                if(role.slug == 'account') {
                    // Show permissions
                    $('#permission_section').addClass('d-none')
                    $('#store_section').addClass('d-none')
                    $('#admin_section').addClass('d-none')
                    $('#mla_section').addClass('d-none')
                    $('#chairman_section').addClass('d-none')
                    $('#approval_section').addClass('d-none')
                    $('#account_section').removeClass('d-none')
                }
                if(role.slug == 'client') {
                    // Show permissions
                    $('#permission_section').addClass('d-none')
                    $('#store_section').addClass('d-none')
                    $('#admin_section').addClass('d-none')
                    $('#mla_section').addClass('d-none')
                    $('#chairman_section').addClass('d-none')
                    $('#approval_section').addClass('d-none')
                    $('#account_section').addClass('d-none')
                }
                if(role.slug == 'approval-officer') {
                    // Show permissions
                    $('#permission_section').addClass('d-none')
                    $('#store_section').addClass('d-none')
                    $('#admin_section').addClass('d-none')
                    $('#mla_section').addClass('d-none')
                    $('#chairman_section').addClass('d-none')
                    $('#approval_section').removeClass('d-none')
                    $('#account_section').addClass('d-none')
                }

                if(role.slug == 'mla') {
                    // Show stations
                    $('#stations').removeClass('d-none')
                } else {
                    // Hide stations
                    $('#stations').addClass('d-none')
                }
            })
        })
    </script>
@endsection
