<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::with('detail')->get()->map(function ($company) {

            $company->contact_name = $company->detail->contact_name;
            $company->email = $company->detail->email;
            $company->phone = $company->detail->phone;

            return $company;
        });

        return view('company.index', compact('companies'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * @param Request $request
     */
    public function store(CompanyRequest $request)
    {
        $fileName = null;

        if ($request->hasFile('logo')) {
            $fileName = $request->name.'.'.$request->file('logo')->getExtension();

            Storage::disk('public')->put($fileName, $request->logo);
        }


        $company = new Company;
        $company->name = $request->name;
        $company->website = $request->website;
        $company->logo = $fileName;
        $company->address = $request->address;

        $company->save();

        $company->detail()->create([
            'contact_name' => $request->contact_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ])

        ($request->except('_token'));
    }

    /**
     * @param Company $company
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * @param Company $company
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * @param Request $request
     * @param Company $company
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
