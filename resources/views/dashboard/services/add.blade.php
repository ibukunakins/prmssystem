@extends('layouts.dashboard')

@section('content')
<section class="col-lg-7 w-full mx-auto">
    @include('partials._errors')
    <div class="card" >
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 text-lg font-bold">Add New Service</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accounts.services.store') }}">
                @csrf
                <div class="form__group">
                    <label for="title">Title<span class="text-danger">*</span></label>
                    <input value="{{ old('title') }}" name="title" required type="text" id="title" class="form__control" placeholder="Enter title">
                    @error('title')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="description">Description<span class="text-danger">*</span></label>
                    <input value="{{ old('description') }}" name="description" required type="text" id="description" class="form__control" placeholder="Enter description">
                    @error('description')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div> 
                <div class="form__group">
                    <label for="duration">Duration (weeks)<span class="text-danger">*</span></label>
                    <input value="{{ old('duration') }}" name="duration" required type="number" id="duration" class="form__control" placeholder="Enter duration">
                    @error('duration')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div> 
                <div class="form__group">
                    <label for="department_id">Department<span class="text-danger">*</span></label>
                    <select name="department_id" id="" class="form__control">
                        <option value="">Choose department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('duration')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div> 
                <div class="mt-2">
                    <button type="submit" class="btn btn-success text-white btn-block">
                        Add Service
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
