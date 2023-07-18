@extends('layouts.dashboard')

@section('content')
@include('partials._errors')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-8">
                <h6 class="text-muted">Profile</h6>
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                                Basic Information
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                                Change Password
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                            <form action="{{ route('dashboard.profile.update', $user->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Company Name</label>
                                    <input type="text" class="form-control" id="basic-default-fullname" disabled value="{{ $user->name }}" placeholder="John Doe" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-email">Email</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="basic-default-email" class="form-control" disabled value="{{ $user->email }}" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-phone">Phone Number</label>
                                    <input name="phone" type="text" id="basic-default-phone" value="{{ old('phone') ?? $user->phone }}" class="form-control phone-mask" placeholder="658 799 8941" />
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                            
                        </div>
                        <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                            <form action="{{ route('dashboard.password') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-phone">New Password</label>
                                    <input name="password" type="password" id="basic-default-phone"  class="form-control phone-mask" placeholder="Enter new password" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-phone">Confirm Password</label>
                                    <input name="password_confirmation" type="password" id="basic-default-phone" class="form-control phone-mask" placeholder="Retype password" />
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection