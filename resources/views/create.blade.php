 @extends('layouts.temp')

 @section('content')
    <h1>Create new Employee</h1>
    <form method="post" action="/employee">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="{{ old('company_name') }}"> 
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 @endsection