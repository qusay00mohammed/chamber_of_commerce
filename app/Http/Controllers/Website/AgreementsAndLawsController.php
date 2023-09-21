<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ConventionLaw;
use Illuminate\Http\Request;

class AgreementsAndLawsController extends Controller
{
    public function agreementsAndLaws()
    {
        $conventionLaw = ConventionLaw::orderBy('id', 'desc')->where('parent_id', null)->get();
        return view('website.convention-law.agreementsAndLaws', compact('conventionLaw'));
    }

    public function agreementsAndLawsDetails($id)
    {
        $agreementsAndLawsDetail = ConventionLaw::findOrFail($id);
        $agreementsAndLawsDetails = ConventionLaw::orderBy('id', 'desc')->where('parent_id', $id)->get();
        return view('website.convention-law.agreementsAndLawsDetails', compact('agreementsAndLawsDetail', 'agreementsAndLawsDetails'));
    }


}
