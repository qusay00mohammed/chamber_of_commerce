<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Generalization;
use Illuminate\Http\Request;

class GeneralizationController extends Controller
{
    public function generalizations()
    {
        $generalizations = Generalization::orderBy('id', 'desc')->get();
        return view('website.generalizations.generalizations', compact('generalizations'));
    }

    public function generalizationsDetails($id)
    {
        $generalizationsDetails = Generalization::findOrFail($id);
        return view('website.generalizations.generalizationsDetails', compact('generalizationsDetails'));
    }

}
