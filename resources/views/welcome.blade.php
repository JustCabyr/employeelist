@extends('layouts.temp')

@section('content')
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                <button type="submit" class="btn btn-danger float-right">Delete</button>


                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endif
        </div>
    @endif
    <div>
        <a class="btn btn-success mt-2" href="company/create">Create new company</a>
        <h2></h2>
        <p>Company list</p>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Logo</th>
                <th scope="col">Website</th>
                <th scope="col">#</th>
            </tr>
        </thead>
            <tbody>
                @if (count($companies) > 0)
                @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td><img src="{{ $company->logo }}" alt="Logo"></td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <a href="/company/{{ $company->id }}/edit" class="btn btn-primary mt-2">Edit</a>
                        <form method="post" action="/company/{{ $company->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger float-right">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>


    <div>
        <a class="btn btn-success mt-2" href="employee/create">Create new employee</a>
        <h2></h2>    
        <p>Employee list</p>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Company Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">#</th>
            </tr>
        </thead>
            <tbody>
                @if (count($employees) > 0)
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <a href="/employee/{{ $employee->id }}/edit" class="btn btn-primary mt-2">Edit</a>
                        <form method="post" action="/employee/{{ $employee->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger float-right">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection