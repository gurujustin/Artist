<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class CalendarController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.calendar.index',
                    [
                        'bookings' => $bookings
                    ]);
    }

    public function change(Request $request)
    {
        $user = User::find($request->id);
        $artists = Artist::whereIn('id', $user->artist->pluck('id'))->get();
        $bookings = array();
        foreach($artists as $row){
            array_push($bookings, Booking::whereIn('price_location_id', $row->pricelocation->pluck('id'))->get());
        }
        return $bookings;
    }
}
