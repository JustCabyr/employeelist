<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $companies = Company::all();
        return view('welcome' ,compact('employees', 'companies'));
        // return view('welcome')->with('employees', 'companies', $companies, $employees);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable'
            ]
        );
        
        $employee = new Employee();
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->company_name = $request->input('company_name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();
        
        return redirect('/')->with('success', 'Employee created succesfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        
        return view('edit')->with('employee', $employee);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->company_name = $request->input('company_name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();

        return redirect('/')->with('success', 'Employee edited succesfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/')->with('success', 'Employee deleted succesfully');
    }
    public function getEmployees(){
        $employees = DB::table('employees')->paginate(8);
        return view('welcome', compact('employees'));
    }
}
