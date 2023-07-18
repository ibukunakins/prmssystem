@php
    $title = 'Login Form';
@endphp
@extends('layouts.app')

@section('content')
@include('partials._errors')
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="form-left-to-wT">
        <span class="fa fa-envelope-o" aria-hidden="true"></span>
        <input type="email" name="email" placeholder="Email" required="" value="{{ old('email') }}">

        <div class="clear"></div>
    </div>
    <div class="form-left-to-wT ">

        <span class="fa fa-lock" aria-hidden="true"></span>
        <input type="password" name="password" placeholder="Password" required="">
        <div class="clear"></div>
    </div>
    <div class="btnn">
        <button type="submit">Login </button>
    </div>
</form>
@endsection

@section('description')
    Login to your dashboard to manage your account
@endsection
