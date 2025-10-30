<?php

namespace App\Http\Controllers;

use App\Http\Filters\AttendanceFilter;
use App\Http\Resources\AttendanceResource;
use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(AttendanceFilter $filters)
    {
        $attends = Attendance::filter($filters)->get();
        $events = Event::with('attendances')->get();

        $attendances = Attendance::with('event')->whereNotNull('used_at')->latest()->take(6)->get();

        $todayEvent = Event::with('attendances')->whereDate('start_date', now())->first();

        return view('admin.index', compact('events', 'attendances', 'todayEvent','attends'));
    }

    // public function attend(AttendanceFilter $filters)
    // {
    //     $attends = Attendance::filter($filters);
    //     return view('admin.index', compact('attends'));
    // }
}
