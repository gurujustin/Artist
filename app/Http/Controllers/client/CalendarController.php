<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $artist = Artist::where('user_id', $user->id)->first();
        if($artist) $bookings = Booking::whereIn('price_location_id', $artist->pricelocation->pluck('id'))->get();
        else $bookings = [];
        return view('client.calendar.index', ['bookings' => $bookings]);
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
