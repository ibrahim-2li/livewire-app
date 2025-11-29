<?php

namespace App\Http\Controllers;

use App\Http\Filters\AttendanceFilter;
use App\Http\Resources\AttendanceResource;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(AttendanceFilter $filters)
    {
        $attends = Attendance::filter($filters)->get();
        $events = Event::with('attendances')->get();
        $users = Admin::all()->count();
        // Build monthly users growth series for the current year (12 points)
        $currentYear = now()->year;
        $usersByMonth = Admin::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();
        $usersSeries = [];
        for ($m = 1; $m <= 12; $m++) {
            $usersSeries[] = $usersByMonth[$m] ?? 0;
        }

        // Attendance yearly statistics (registrations & check-ins)
        $attendanceYearlyStats = Attendance::selectRaw('YEAR(created_at) as year, COUNT(*) as registrations')
            ->selectRaw('SUM(CASE WHEN used_at IS NOT NULL THEN 1 ELSE 0 END) as check_ins')
            ->groupBy('year')
            ->orderByDesc('year')
            ->take(5)
            ->get();
        $attendanceYears = $attendanceYearlyStats->pluck('year')->toArray();
        $primaryYearStats = $attendanceYearlyStats->first();
        $secondaryYearStats = $attendanceYearlyStats->skip(1)->first();

        $revenueYears = collect([$primaryYearStats->year ?? null, $secondaryYearStats->year ?? null])
            ->filter()
            ->unique()
            ->values();

        $monthlyAttendance = Attendance::selectRaw('YEAR(created_at) as year')
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('COUNT(*) as registrations')
            ->whereIn(DB::raw('YEAR(created_at)'), $revenueYears)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->groupBy('year')
            ->map(function ($rows) {
                $series = array_fill(1, 12, 0);
                foreach ($rows as $row) {
                    $series[(int) $row->month] = (int) $row->registrations;
                }

                return array_values($series);
            });

        $totalRevenueSeries = $revenueYears->map(function ($year) use ($monthlyAttendance) {
            return [
                'name' => (string) $year,
                'data' => $monthlyAttendance->get($year, array_fill(0, 12, 0)),
            ];
        })->values()->toArray();
        // Compute month-over-month growth for current month vs previous month
        $currentMonth = now()->month;
        $lastCount = $usersByMonth[$currentMonth] ?? 0;
        $prevCount = $usersByMonth[$currentMonth - 1] ?? 0;
        if ($prevCount > 0) {
            $usersGrowthPercent = round((($lastCount - $prevCount) / $prevCount) * 100, 1);
        } else {
            // If there was no previous month users, consider 100% if there are new users, else 0%
            $usersGrowthPercent = $lastCount > 0 ? 100.0 : 0.0;
        }
        $usersGrowthClass = $usersGrowthPercent > 0 ? 'text-success' : ($usersGrowthPercent < 0 ? 'text-danger' : 'text-secondary');
        $usersGrowthIcon = $usersGrowthPercent > 0 ? 'bx-chevron-up' : ($usersGrowthPercent < 0 ? 'bx-chevron-down' : 'bx-minus');

        $attendances = Attendance::with('event')->whereNotNull('used_at')->latest('used_at')->limit(6)->get();

        $todayEvent = Event::with('attendances')->whereDate('start_date', now())->first();

        // Get country statistics
        $countryStats = Attendance::whereNotNull('country')
            ->where('country', '!=', '')
            ->selectRaw('country, COUNT(*) as count')
            ->groupBy('country')
            ->orderBy('count', 'desc')
            ->get();

        $countryNames = $countryStats->pluck('country')->toArray();
        $countryCounts = $countryStats->pluck('count')->toArray();

        // Attendance growth (check-ins) current month vs previous month
        $attByMonth = Attendance::selectRaw('MONTH(used_at) as month, COUNT(*) as count')
            ->whereNotNull('used_at')
            ->whereYear('used_at', $currentYear)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();
        $attThisMonth = $attByMonth[$currentMonth] ?? 0;
        $attPrevMonth = $attByMonth[$currentMonth - 1] ?? 0;
        if ($attPrevMonth > 0) {
            $attendanceGrowthPercent = round((($attThisMonth - $attPrevMonth) / $attPrevMonth) * 100, 1);
        } else {
            $attendanceGrowthPercent = $attThisMonth > 0 ? 100.0 : 0.0;
        }

        return view('admin.index', compact(
            'users',
            'events',
            'attendances',
            'todayEvent',
            'attends',
            'countryNames',
            'countryCounts',
            'usersSeries',
            'currentYear',
            'usersGrowthPercent',
            'usersGrowthClass',
            'usersGrowthIcon',
            'attendanceGrowthPercent',
            'attendanceYears',
            'primaryYearStats',
            'secondaryYearStats',
            'totalRevenueSeries'
        ));
    }

    // public function attend(AttendanceFilter $filters)
    // {
    //     $attends = Attendance::filter($filters);
    //     return view('admin.index', compact('attends'));
    // }
}
