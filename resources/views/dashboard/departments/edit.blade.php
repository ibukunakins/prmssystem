@extends('layouts.dashboard')

@section('content')
<section class="col-lg-7 w-full mx-auto">
    @include('partials._errors')
    <div class="card" >
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 text-lg font-bold">Edit Department</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accounts.departments.update', $department->id) }}">
                @csrf
                @method('PUT')
                <div class="form__group">
                    <label for="name">Name<span class="text-danger">*</span></label>
                    <input value="{{ old('name') ?? $department->name }}" name="name" required type="text" id="name" class="form__control" placeholder="Enter name">
                    @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>      
                <div class="mt-2">
                    <button type="submit" class="btn btn-success text-white btn-block">
                        Update Department
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
