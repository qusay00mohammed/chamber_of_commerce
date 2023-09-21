<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MediaCenter\MediaCenter;
use App\Models\Version;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Stevebauman\Location\Facades\Location;
use Stevebauman\Location\Facades\Location;

class MediaCenterController extends Controller
{


    public function getNewsCalendat(Request $request)
    {
        $d = explode('(', $request->currentDate);

        $date = Carbon::parse($d[0]);

        $formattedDate = $date->format('Y-m-d');

        $news = MediaCenter::orderBy('id', 'desc')->whereIn('type', ['erez', 'rafah', 'keremShalom'])->whereDate('publication_at', $formattedDate)->first();

        return response()->json([
            'status' => true,
            'data' => $news
        ]);


        return view('website.media-center.mediaCenterNews', compact('news'));
    }

    public function mediaCenterNews()
    {
        $news = MediaCenter::orderBy('id', 'desc')->where('type', 'news')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->paginate(12);
        return view('website.media-center.mediaCenterNews', compact('news'));
    }

    public function mediaCenterEvents()
    {
        $activities = MediaCenter::orderBy('id', 'desc')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->where('type', 'activity')->paginate(9);
        return view('website.media-center.mediaCenterEvents', compact('activities'));
    }

    public function mediaCenterImage()
    {
        $images = MediaCenter::orderBy('id', 'desc')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->where('type', 'image')->with('files')->paginate(9);
        return view('website.media-center.mediaCenterImage', compact('images'));
    }

    public function mediaCenterVideo()
    {
        $videos = MediaCenter::orderBy('id', 'desc')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->where('type', 'video')->paginate(9);
        return view('website.media-center.mediaCenterVideo', compact('videos'));
    }

    public function newsDetails(Request $request, $id)
    {
        // dd($request->ip());
        // $current_name = Location::get($request->ip())->countryName;
        // dd($current_name);


        $news = MediaCenter::with('files')->findOrFail($id);

        if (!$news) {
            abort(404);
        }

        if (!session()->has('visited_articles')) {
            session(['visited_articles' => []]);
        }

        $visitedArticles = session('visited_articles');

        if (!in_array($news->id, $visitedArticles)) {

            session(['visited_articles' => array_merge($visitedArticles, [$news->id])]);

            $current_name = Location::get('176.106.41.254')->countryName;

            $visit = Visit::where('media_center_id', $news->id)->where('country', $current_name)->first();

            if($visit) {
                $update_visit = $visit->update([
                    'visits_count' => $visit->visits_count + 1,
                ]);
            }
            else
            {
                $store_visit = Visit::create([
                    'country' => $current_name,
                    'visits_count' => 1,
                    'media_center_id' => $news->id
                ]);
            }
        }

        return view('website.media-center.newsDetails', compact('news'));
    }

    public function mediaCenterVersions()
    {
        $versions = Version::orderBy('id', 'desc')->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->get();
        return view('website.media-center.mediaCenterVersions', compact('versions'));
    }


}
