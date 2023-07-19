@extends('layouts.dashboard')

@section('content')
<section class="col-lg-7 w-full mx-auto">
    @include('partials._errors')
    <div class="card" >
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 text-lg font-bold">Update Profile</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                <div class="form__group">
                    <label for="name">Name<span class="text-danger">*</span></label>
                    <input value="{{ old('name', $user->name) }}" name="name" required type="text" id="name" class="form__control" placeholder="Enter name">
                    @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input value="{{ old('email', $user->email) }}" name="email" required type="email" id="email" class="form__control" placeholder="Enter email">
                    @error('email')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-success text-white btn-block">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection