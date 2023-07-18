@extends('layouts.dashboard')

@section('content')
<section class="col-lg-8 w-full mx-auto">
    @include('partials._errors')
    <div class="card" >
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 text-lg font-bold">Add New Patient</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accounts.patients.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form__group">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <select name="title" id="" class="form__control">
                                <option value="">Choose</option>
                                <option {{ old('title') == 'Mr' ? 'selected' : '' }} value="Mr">Mr</option>
                                <option {{ old('title') == 'Miss' ? 'selected' : '' }} value="Miss">Miss</option>
                                <option {{ old('title') == 'Mrs' ? 'selected' : '' }} value="Mrs">Mrs</option>
                                <option {{ old('title') == 'Master' ? 'selected' : '' }} value="Master">Master</option>
                            </select>
                            @error('title')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form__group">
                            <label for="first_name">First Name<span class="text-danger">*</span></label>
                            <input value="{{ old('first_name') }}" name="first_name" required type="text" id="first_name" class="form__control" placeholder="Enter first name">
                            @error('first_name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-5">
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
                            <label for="marital_status">Marital Status<span class="text-danger">*</span></label>
                            <select name="marital_status" id="marital_status" class="form__control">
                                <option value="">Choose option</option>
                                <option {{ old('marital_status') == 'd' ? 'selected' : '' }} value="d">Divorced</option>
                                <option {{ old('marital_status') == 'm' ? 'selected' : '' }} value="m">Married</option>
                                <option {{ old('marital_status') == 's' ? 'selected' : '' }} value="s">Single</option>
                                <option {{ old('marital_status') == 'w' ? 'selected' : '' }} value="w">Widowed</option>
                            </select>
                            @error('marital_status')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="gender">Gender<span class="text-danger">*</span></label>
                            <select name="gender" id="gender" class="form__control">
                                <option value="">Choose option</option>
                                <option {{ old('gender') == 'm' ? 'selected' : '' }} value="m">Male</option>
                                <option {{ old('gender') == 'f' ? 'selected' : '' }} value="f">Female</option>
                                <option {{ old('gender') == 'o' ? 'selected' : '' }} value="o">Other</option>
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
                            <label for="dob">Date of birth<span class="text-danger">*</span></label>
                            <input value="{{ old('dob') }}" name="dob" type="date" id="dob" class="form__control" placeholder="Enter dob">
                            @error('dob')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="address">Address<span class="text-danger">*</span></label>
                            <input value="{{ old('address') }}" name="address" required type="text" id="address" class="form__control" placeholder="Enter address">
                            @error('address')
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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="contact_name">Contact Name</label>
                            <input value="{{ old('contact_name') }}" name="contact_name" required type="text" id="contact_name" class="form__control" placeholder="Enter contact name">
                            @error('contact_name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form__group">
                            <label for="contact_phone">Contact Phone Number</label>
                            <input value="{{ old('contact_phone') }}" name="contact_phone" type="text" id="contact_phone" class="form__control" placeholder="Enter contact phone">
                            @error('contact_phone')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>  
                
                <div class="mt-2">
                    <button type="submit" class="btn btn-success text-white btn-block">
                        Add Patient
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
