<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MediaCenter\MediaCenter;
use Illuminate\Http\Request;

class crossingNewsController extends Controller
{
    public function crossingsNews()
    {
        return view('website.crossings-news.crossingsNews');
    }


    public function crossingNews($name)
    {
        if ($name != 'erez' and $name != 'keremShalom' and $name != 'rafah') {
            abort(404);
        }

        $news = MediaCenter::orderBy('id', 'desc')->where('type', $name)->paginate(4);
        return view('website.crossings-news.crossingNews', compact('news', 'name'));
    }


}
