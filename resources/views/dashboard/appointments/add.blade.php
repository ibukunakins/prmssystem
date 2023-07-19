@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('datetime/jquery.datetimepicker.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container{
        width: 100% !important
    }
    .select2-container .select2-selection--single{
        height: 50px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 50px
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 10px
    }
</style>
@endsection

@section('content')
<section class="col-lg-7 w-full mx-auto">
    <div class="card" >
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 text-lg font-bold">Schedule New Appointment</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accounts.appointments.store') }}">
                @csrf
                <div class="form__group">
                    <label for="patient_id">Patient<span class="text-danger">*</span></label>
                    <select name="patient_id" class="select2 form__control" id="">
                        <option value="">Choose patient</option>
                        @foreach ($patients as $patient)
                            <option {{ old('patient_id') == $patient->id ? 'selected' :'' }} value="{{ $patient->id }}">{{ $patient->full_name }}</option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="staff_id">Staff<span class="text-danger">*</span></label>
                    <select name="staff_id" class="select2 form__control" id="staff_id">
                        <option value="">Choose staff</option>
                        @foreach ($staff as $value)
                            <option {{ old('staff_id') == $value->id ? 'selected' :'' }} value="{{ $value->id }}">{{ $value->full_name }}</option>
                        @endforeach
                    </select>
                    @error('staff_id')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div> 
                <div class="form__group">
                    <label for="service_id">Service<span class="text-danger">*</span></label>
                    <select name="service_id" class="select2 form__control" id="service_id">
                        <option value="">Choose service</option>
                        @foreach ($services as $value)
                            <option {{ old('service_id') == $value->id ? 'selected' :'' }} value="{{ $value->id }}">{{ $value->title }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div> 
                <div class="form__group">
                    <label for="date_time">Choose Date & Time<span class="text-danger">*</span></label>
                    <input id="datetimepicker" value="{{ old('date_time') }}" name="date_time" required type="text" id="date_time" class="form__control" placeholder="Enter preferred date">
                    @error('date_time')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="title">Appointment Title<span class="text-danger">*</span></label>
                    <input type="text" class="form__control" name="title" required placeholder="Enter title" value="{{ old('title') }}">
                    @error('title')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="description">Appointment Description</label>
                    <textarea name="description" rows="4" id="description" class="form__control" placeholder="Enter description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-success text-white btn-block">
                        Schedule Appointment
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('datetime/jquery.js') }}"></script>
<script src="{{ asset('datetime/jquery.datetimepicker.full.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(() => {
            $('.select2').select2();
        })
        jQuery('#datetimepicker').datetimepicker();
    </script>
@endsection
