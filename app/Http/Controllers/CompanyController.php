<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Technology;
use App\Company;
use App\City;
use App\Region;
use App\Country;
use App\Contact;
use App\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function addCompany(Request $request)
    {
        $company = new Company;
        $userId = $request->input('user_id');
        $company->title = htmlspecialchars($request->input('title'));
        $company->location = htmlspecialchars($request->input('location'));

        if (!empty($company->title) && !empty($company->location)) {
            $company->save();

           $id = $company->id;

            $user = User::find($userId);

            $user->companies()->attach($id);

            return redirect()->route('profile', $userId);


        }

        return redirect()->route('profile', $userId);

    }

    public function companyDelete(Request $request)
    {
        $userId = $request->input('user_id');
        $companyId = $request->input('company_id');

        Company::destroy($companyId);

        $user = User::find($userId);
        $user->companies()->detach($companyId);

        return redirect()->route('profile', $userId);


    }
}
