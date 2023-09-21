<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function roomPrograms()
    {
        $programs = Program::orderBy('id', 'desc')->get();
        return view('website.programs.roomPrograms', compact('programs'));
    }

    public function roomProgramsDetails($id)
    {
        $program = Program::findOrFail($id);
        return view('website.programs.roomProgramsDetails', compact('program'));
    }


}
