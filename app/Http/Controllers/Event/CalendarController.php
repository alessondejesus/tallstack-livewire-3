<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __invoke(Request $request)
    {
        $start = Carbon::parse($request->start)->toDateTimeString();
        $end = Carbon::parse($request->end)->toDateTimeString();

        return Event::query()
            ->select('id', 'start', 'end', 'title')
            ->whereDate('start', '>=', $start)
            ->whereDate('end', '<=', $end)
            ->get();
    }
}
