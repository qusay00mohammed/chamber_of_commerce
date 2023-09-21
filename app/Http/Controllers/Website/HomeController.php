<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Committee;
use App\Models\ConventionLaw;
use App\Models\MediaCenter\MediaCenter;
use App\Models\Member;
use App\Models\OfficialAgency;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TradeDelegation;
use App\Models\Version;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $committees = Committee::orderBy('id', 'desc')->take(10)->get();
        $services = Service::orderBy('id', 'desc')->take(6)->get();
        $officialAgency = OfficialAgency::orderBy('id', 'desc')->take(5)->get();
        $members = Member::where('type', 'council')->orderBy('id', 'desc')->get();
        $tradeDelegation = TradeDelegation::orderBy('id', 'desc')->get();
        $partners = Partner::orderBy('id', 'desc')->get();
        $achievements = Achievement::orderBy('id', 'desc')->get();

        // ->whereIn('status', ['scheduled', 'active'])
        // ->where('created_at', '<=', now())
        $slider = MediaCenter::orderBy('id', 'desc')->where('type', 'news')->where('showInSlider', 'yes')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->get();

        $news = MediaCenter::orderBy('id', 'desc')->where('type', 'news')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->take(5)->get();
        $activities = MediaCenter::orderBy('id', 'desc')->where('type', 'activity')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->take(5)->get();
        $images = MediaCenter::orderBy('id', 'desc')->where('type', 'image')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->with('files')->take(4)->get();

        $videos = MediaCenter::orderBy('id', 'desc')->where('type', 'video')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->get();

        $conventionFiles = ConventionLaw::orderBy('id', 'desc')->where('parent_id', '!=', null)->take(6)->get();

        $versions = Version::orderBy('id', 'desc')->take(6)->get();



        return view('website.index', get_defined_vars());
    }
}
