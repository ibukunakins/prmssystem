@extends('layouts.dashboard')

@section('content')
<section class="col-lg-7 w-full mx-auto">
    @include('partials._errors')
    <div class="card" >
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 text-lg font-bold">Add New Staff</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.staffs.store') }}">
                @csrf
                <input type="hidden" name="company_id" value="{{ $company->id }}">
                <div class="form__group">
                    <label for="name">Staff Name<span class="text-danger">*</span></label>
                    <input value="{{ old('name') }}" name="name" required type="text" id="name" class="form__control" placeholder="Enter name">
                    @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid lg:grid-cols-2 gap-x-4">
                    <div class="form__group">
                        <label for="phone">Phone Number<span class="text-danger">*</span></label>
                        <input value="{{ old('phone') }}" minlength="11" maxlength="11" name="phone" required type="text" id="phone" class="form__control" placeholder="Enter phone number">
                        @error('phone')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form__group">
                        <label for="monthly_salary">Monthly Basic Salary<span class="text-danger">*</span></label>
                        <input value="{{ old('monthly_salary') }}" required name="monthly_salary" type="number" id="monthly_salary" class="form__control" placeholder="Enter salary">
                        @error('email')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    @if ($company->allowances->count() > 0)
                        <h1 style="font-size: 18px; font-weight:700">Staff Monthly Allowanaces</h1>

                        <div class="row">
                            @foreach ($company->allowances as $allowance)
                                <div class="col-6">
                                    <div class="form__group">
                                        <label for="allowances">{{ $allowance->name }}<span class="text-danger">*</span></label>
                                        <input value="{{ old('monthly_salary') ?? $allowance->amount }}" required name="allowances[{{ $allowance->name }}]" type="number" id="allowances" class="form__control" placeholder="Enter amount">
                                        @error('email')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    
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
