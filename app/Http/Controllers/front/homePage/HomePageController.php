<?php

namespace App\Http\Controllers\front\homePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('front.homePage.homePage');
    }
}
