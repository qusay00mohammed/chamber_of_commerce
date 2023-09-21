<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    public function chamberCommitteesPage()
    {
        $committees = Committee::orderBy('id', 'desc')->get();
        return view('website.committees.chamberCommitteesPage', compact('committees'));
    }

    public function commissionsPage($id)
    {
        $committee = Committee::with('members')->findOrFail($id);
        return view('website.committees.commissionsPage', compact('committee'));
    }
}
