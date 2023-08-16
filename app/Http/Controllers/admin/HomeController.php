<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MyNotification;

class HomeController extends Controller
{


    public function __construct()
    {
    }

    public function home()
    {
        $leads = Lead::orderBy('created_at', 'desc')->where('archive', 0)->take(10)->get();
        return view('admin.home', ['leads' => $leads]);
    }
}