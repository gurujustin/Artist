<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Artist;
use App\Models\Booking;

class IndexController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        $artists = Artist::where('user_id', $user->id)->get();
        $today_bookings = 0;
        $all_bookings = 0;
        $today_payments = 0;
        $all_payments = 0;
        $total_bookings = array();
        if($artists){
            foreach($artists as $row){
                $today_bookings += Booking::where('created_at', '>=', date('Y-m-d'))
                                        ->whereIn('price_location_id', $row->pricelocation->pluck('id'))
                                        ->count();
                $all_bookings += Booking::whereIn('price_location_id', $row->pricelocation->pluck('id'))
                                        ->count();
                $today_payments += Booking::where('created_at', '>=', date('Y-m-d'))
                                        ->whereIn('price_location_id', $row->pricelocation->pluck('id'))
                                        ->sum('amount');
                $all_payments += Booking::whereIn('price_location_id', $row->pricelocation->pluck('id'))
                                        ->sum('amount');
                $booking = Booking::whereIn('price_location_id', $row->pricelocation->pluck('id'))->latest()->take(10)->get();
                foreach ($booking as $item) {
                    array_push($total_bookings, $item);
                }
            }
            if($all_bookings) $booking_rate = $today_bookings / $all_bookings * 100;
            else $booking_rate = 0;
            if($all_payments) $payment_rate = $today_payments / $all_payments * 100;
            else $payment_rate = 0;
        }
        return view('client.dashboard', [
                            'user' => $user,
                            'today_bookings' => $today_bookings,
                            'booking_rate' => $booking_rate,
                            'today_payments' => $today_payments,
                            'payment_rate' => $payment_rate,
                            'total_booking' => $all_bookings,
                            'total_payment' => $all_payments,
                            'total_bookings' => $total_bookings
                        ]);
    }
}