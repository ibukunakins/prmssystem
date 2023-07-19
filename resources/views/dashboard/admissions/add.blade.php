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
            <h4 class="mb-0 text-lg font-bold">Admit New Patient</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accounts.admissions.store') }}">
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
                    <label for="admission_type">Admission Type<span class="text-danger">*</span></label>
                    <select name="admission_type" class="select2 form__control" id="admission_type">
                        <option value="">Choose option</option>
                        <option value="Accident">Accident</option>
                        <option value="Labour">Labour Room</option>
                        <option value="Emergency">Emergency</option>
                        <option value="Surgery">Surgery</option>
                    </select>
                    @error('admission_type')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="room_no">Room Number<span class="text-danger">*</span></label>
                    <input value="{{ old('room_no') }}" name="room_no" required type="text" id="room_no" class="form__control" placeholder="Enter room number">
                    @error('room_no')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="ward_no">Ward Number<span class="text-danger">*</span></label>
                    <input value="{{ old('ward_no') }}" name="ward_no" required type="text" id="ward_no" class="form__control" placeholder="Enter ward number">
                    @error('ward_no')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="comment">Appointment Comment</label>
                    <textarea name="comment" rows="4" id="comment" class="form__control" placeholder="Enter comment">{{ old('comment') }}</textarea>
                    @error('comment')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-success text-white btn-block">
                        Submit Record
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
