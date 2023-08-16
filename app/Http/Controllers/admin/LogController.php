<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ActivityLog;
class LogController extends Controller
{
    

    public function index()
    {
        $activityLogs = ActivityLog::orderBy('created_at', 'desc')->get();
        return view('admin.log', ['activityLogs' => $activityLogs]);
       
    }

}
