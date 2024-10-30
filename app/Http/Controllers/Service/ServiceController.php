<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function view()
    {
        $services = Service::all();

        return view('service.index', ['services' => $services]);
    }

    public function details($id)
    {
        $service = Service::findOrFail($id);

        return view('service.details', ['service' => $service]);
    }

    public function viewCreate()
    {
        return view('service.index');
    }
}
