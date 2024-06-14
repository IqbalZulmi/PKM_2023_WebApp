<?php

namespace App\Http\Controllers;

use App\Models\humidity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    public function showLandingPage(){
        return view('landing',[

        ]);
    }
}
