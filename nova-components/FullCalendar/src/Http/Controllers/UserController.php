<?php

namespace Findex\FullCalendar\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'start' => ['required', 'string'],
            'end' => ['required', 'string'],
        ]);

        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        return response()->json(
            User::whereBetween('created_at', [$start, $end])->get()
        );
    }
}
