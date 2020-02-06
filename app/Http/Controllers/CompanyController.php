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
        $companies = Company::with('contact')->get()->map(function ($company) {

            $company->contact_name = $company->contact->contact_name;
            $company->email = $company->contact->email;
            $company->phone = $company->contact->phone;

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

        $company->contact()->create([
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company)
    {

        $company->update([
            'name' => $request->name,
            'address' => $request->address,
            'website' => $request->website,
        ]);
        $company->contact()->update([
            'contact_name' => $request->contact_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('companies.index');
    }

    /**
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Company $company)
    {

        if ($company->contact()->count() == 0) {
            $company->delete();
        }

        return redirect()->route('companies.index');

    }
}
