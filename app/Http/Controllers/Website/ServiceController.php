<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function servicesPage()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('website.services.servicesPage', compact('services'));
    }

    public function serviceDetailsPage($id)
    {
        $service = Service::findOrFail($id);
        return view('website.services.serviceDetailsPage', compact('service'));
    }
}
