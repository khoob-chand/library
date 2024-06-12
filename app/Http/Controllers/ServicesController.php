<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function GetAllServices() {
        $services =Services::all();
        $data =compact('services');
        return view('service')->with($data);
    }
}

