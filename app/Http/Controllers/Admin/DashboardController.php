<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MediaCenter\MediaCenter;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $visits = DB::table('visits')
        // ->select('country', DB::raw('COUNT(*) as visits_count'))
        // ->groupBy('country')
        // ->get();

        $donates = Payment::where('status', 'paid')->get();

        $visits = Visit::select('country', DB::raw('COUNT(*) as visits_count'))->groupBy('country')->get();
        $news_count = MediaCenter::whereIn('type', ['erez', 'rafah', 'news', 'KeremShalom'])->count();
        $messages_count = Contact::count();
        $services_count = Service::count();

        return view('admin.dashboard', compact('visits', 'news_count', 'messages_count', 'services_count', 'donates'));
    }
}
