<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Home($nam=null) {
        $data =compact('nam');
        return view('home')->with($data);
    }
}
