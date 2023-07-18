@extends('layouts.dashboard')

@section('content')
<section class="col-lg-7 w-full mx-auto">
    @include('partials._errors')
    <div class="card" >
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 text-lg font-bold">Add New Staff</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accounts.staff.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="first_name">First Name<span class="text-danger">*</span></label>
                            <input value="{{ old('first_name') }}" name="first_name" required type="text" id="first_name" class="form__control" placeholder="Enter first name">
                            @error('first_name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="last_name">Last Name<span class="text-danger">*</span></label>
                            <input value="{{ old('last_name') }}" name="last_name" required type="text" id="last_name" class="form__control" placeholder="Enter last name">
                            @error('last_name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="middle_name">Middle Name</label>
                            <input value="{{ old('middle_name') }}" name="middle_name" type="text" id="middle_name" class="form__control" placeholder="Enter middle name">
                            @error('middle_name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="phone">Phone Number<span class="text-danger">*</span></label>
                            <input value="{{ old('phone') }}" name="phone" required type="text" id="phone" class="form__control" placeholder="Enter phone">
                            @error('phone')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input value="{{ old('email') }}" name="email" required type="text" id="email" class="form__control" placeholder="Enter email">
                            @error('email')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="gender">Gender<span class="text-danger">*</span></label>
                            <select name="gender" id="gender" class="form__control">
                                <option value="">Choose option</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>
                            </select>
                            @error('gender')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="marital_status">Marital Status<span class="text-danger">*</span></label>
                            <select name="marital_status" id="marital_status" class="form__control">
                                <option value="">Choose option</option>
                                <option value="d">Divorced</option>
                                <option value="m">Married</option>
                                <option value="s">Single</option>
                                <option value="w">Widowed</option>
                            </select>
                            @error('marital_status')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="dob">Date of birth<span class="text-danger">*</span></label>
                            <input value="{{ old('dob') }}" name="dob" type="date" id="dob" class="form__control" placeholder="Enter dob">
                            @error('dob')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>      
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="title">Designation<span class="text-danger">*</span></label>
                            <input value="{{ old('title') }}" name="title" required type="text" id="title" class="form__control" placeholder="Enter designation">
                            @error('title')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="department_id">Department<span class="text-danger">*</span></label>
                            <select name="department_id" id="department_id" class="form__control">
                                <option value="">Choose option</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>       
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="city">City<span class="text-danger">*</span></label>
                            <input value="{{ old('city') }}" name="city" required type="text" id="city" class="form__control" placeholder="Enter city">
                            @error('city')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="post_code">Postal Code<span class="text-danger">*</span></label>
                            <input value="{{ old('post_code') }}" name="post_code" type="text" id="post_code" class="form__control" placeholder="Enter postal code">
                            @error('post_code')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>  
                <div class="form__group">
                    <label for="address">Address<span class="text-danger">*</span></label>
                    <input value="{{ old('address') }}" name="address" required type="text" id="address" class="form__control" placeholder="Enter address">
                    @error('address')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-success text-white btn-block">
                        Add New Staff
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
            
        })
    </script>
@endsection
