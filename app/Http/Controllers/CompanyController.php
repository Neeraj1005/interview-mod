<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->paginate(Company::PAGINATE_DATA);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $validatedData = $request->validated() + ['user_id' => auth()->id()];

        try {
            if (request('logo')) {
                $validatedData['logo'] = $request->logo->storePublicly('company', 'public');
             }
     
             Company::create($validatedData);
     
             return to_route('companies.index')->with('message', 'company added sucessfully');
        } catch (\Throwable $th) {
            return to_route('companies.index')->with('error', 'something went wrong! '. $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.view', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $validatedData = $request->validated() + ['user_id' => auth()->id()];

        try {
            if (request('logo')) {
                $validatedData['logo'] = $request->logo->storePublicly('company', 'public');
            } else {
                unset($request->logo);
            }
    
            $company->update($validatedData);
    
            return to_route('companies.index')->with('message', 'company updated sucessfully');
        } catch (\Throwable $th) {
            return to_route('companies.index')->with('error', 'something went wrong! '. $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return to_route('companies.index')->with('message', 'company deleted sucessfully');
    }
}
