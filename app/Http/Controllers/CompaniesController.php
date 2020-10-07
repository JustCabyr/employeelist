<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();
        return view('home')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createcompany');
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
                'name' => 'required',
                'email' => '',
                'logo' => '',
                'website' => ''
            ] 
        );

        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        // $company->logo = $request->input('logo');
        $company->website = $request->input('website');
        
      
        // $destinationPath = public_path('/logos');
        // $name = $image->getClientOriginalExtension();
        // $imagePath = $destinationPath. "/".  $name;
        // $company->logo = $imagePath;
        
        if ($request->file('logo')) {
            $image = $request->file('logo');
          
            $ext = $image->getClientOriginalExtension();
            $name = $image->getClientOriginalName();

            $destinationPath = public_path('/logos');
            $imagePath = $destinationPath.  $name.'.'.$ext;
            // dd($imagePath);
            // $image->move($destinationPath, $name);
            $company->logo = $imagePath;

            
        }
        $company->save();
        return redirect('/')->with('success', 'Company created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        
        return view('editcompany')->with('company', $company);
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
        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $request->input('logo');
        $company->website = $request->input('website');
        $company->save();

        return redirect('/')->with('success', 'Company edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect('/')->with('success', 'Company deleted succesfully');
    }
    public function getCompanies(){
        $companies = DB::table('companies')->paginate(8);
        return view('welcome', compact('companies'));
    }
}
