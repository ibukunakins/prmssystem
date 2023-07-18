@extends('layouts.dashboard')

@section('content')
<section class="col-lg-7 w-full mx-auto">
    @include('partials._errors')
    <div class="card" >
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 text-lg font-bold">Add New Company</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.clients.store') }}">
                @csrf
                <div class="form__group">
                    <label for="name">Name<span class="text-danger">*</span></label>
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
                        <label for="email">Email Address<span class="text-danger">*</span></label>
                        <input value="{{ old('email') }}" required name="email" type="email" id="email" class="form__control" placeholder="Enter email address">
                        @error('email')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form__group">
                        <label for="address">Address<span class="text-danger">*</span></label>
                        <input value="{{ old('address') }}" required name="address" type="text" id="address" class="form__control" placeholder="Company address">
                        @error('address')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>        
                <div class="mt-2">
                    <button type="submit" class="btn btn-success text-white btn-block">
                        Add Company
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
