<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getAllCompanies(Request $request)
    {
        $companies = Company::orderBy('id', 'DESC');

        if ($request->id) {
            $companies->where('id', $request->id);
        }

        if ($request->name) {
            $companies->where('name', $request->name);
        }

        if ($request->code) {
            $companies->where('code', $request->code);
        }

        if ($request->address) {
            $companies->where('address', $request->address);
        }

        if ($request->city) {
            $companies->where('city', $request->city);
        }

        if ($request->country) {
            $companies->where('country', $request->country);
        }

        $companies = $companies->get();

        return view('companies-page')->with('companies', $companies);
    }

    public function saveCompany(Request $request)
    {
        Company::create([
            'name'     => $request->name,
            'code'    => $request->code,
            'address'     => $request->address,
            'city'    => $request->city,
            'country' => $request->country
        ]);

        return redirect()->route('companies.all');
    }

    public function editCompany($id)
    {
        $company_to_edit = Company::where('id', $id)->firstOrFail();

        return view('edit-form')->with('company', $company_to_edit);
    }

    public function updateCompany(Request $request, $id)
    {
        Company::where('id', $id)->update([
            'name'     => $request->name,
            'code'    => $request->code,
            'address'     => $request->address,
            'city'    => $request->city,
            'country' => $request->country,
        ]);

        return redirect()->route('companies.all');
    }

    public function deleteCompany(Request $request)
    {
        Company::where('id', $request->company_id)->delete();

        return redirect()->back();
    }
}
