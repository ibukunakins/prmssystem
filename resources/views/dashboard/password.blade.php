@extends('layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-6">
                <div class="card" >
                    <div class="card-header bg-white text-center">
                        <h4 class="mb-0 text-lg font-bold">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form__group">
                                <label for="current_password">Current Password<span class="text-danger">*</span></label>
                                <input name="current_password" required type="password" id="current_password" class="form__control" placeholder="Enter current password">
                                @error('current_password')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form__group">
                                <label for="name">New Password<span class="text-danger">*</span></label>
                                <input name="password" required type="password" id="name" class="form__control" placeholder="Enter new password">
                                @error('password')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form__group">
                                <label for="password_confirmation">Confirm Password<span class="text-danger">*</span></label>
                                <input name="password_confirmation" required type="password" id="password_confirmation" class="form__control" placeholder="Retype password">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection