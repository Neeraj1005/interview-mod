<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employe;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employe::latest()->paginate(Employe::PAGINATE_DATA);
        return view('employe.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();

        return view('employe.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeRequest $request)
    {
        $validatedData = $request->validated() + ['user_id' => auth()->id()];

        try {
            Employe::create($validatedData);

            return to_route('employees.index')->with('message', 'employe added sucessfully');
        } catch (\Throwable $th) {
            return to_route('employees.index')->with('error', 'something went wrong! ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employee)
    {
        return view('employe.view', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employee)
    {
        $company = Company::all();

        return view('employe.edit', compact('company', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeRequest  $request
     * @param  \App\Models\Employe  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeRequest $request, Employe $employee)
    {
        $validatedData = $request->validated() + ['user_id' => auth()->id()];

        try {
            $employee->update($validatedData);

            return to_route('employees.index')->with('message', 'employe updated sucessfully');
        } catch (\Throwable $th) {
            return to_route('employees.index')->with('error', 'something went wrong! ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employee)
    {
        $employee->delete();

        return to_route('companies.index')->with('message', 'employe deleted sucessfully');
    }
}
