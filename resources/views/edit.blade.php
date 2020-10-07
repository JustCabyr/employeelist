@extends('layouts.temp')

@section('content')
    <h1>Edit Employee</h1>
    <form method="post" action="/employee/{{ $employee->id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="{{ $employee->first_name }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{ $employee->last_name }}">
        </div>
        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="{{ $employee->company_name }}"> 
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ $employee->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="{{ $employee->phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection