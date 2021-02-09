<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;
use App\Models\Booking;
use App\Models\Event;
use App\Models\User;

class BookingController extends Controller
{
    function index(){
        $user = User::find(Auth::user()->id);
        $artist = Artist::where('user_id', $user->id)->first();
        if($artist) $bookings = Booking::whereIn('price_location_id', $artist->pricelocation->pluck('id'))->get();
        else $bookings = [];
        return view('client.booking.index', ['bookings' => $bookings]);
    }


    public function view(Request $request)
    {
        $id = $request->id;
        $booking = Booking::find($id);
        $eventtypes = Event::all();
        return view('client.booking.edit', ['booking' => $booking, 'eventtypes' => $eventtypes]);
    }

    public function contactcustomer($id)
    {
        $booking = Booking::find($id);
        $email = $booking->email;
        $name = $booking->name;
        $tel = $booking->tel;
        return view('client.booking.contact', ['email' => $email, 'name' => $name, 'tel' => $tel]);
    }

    public function contactartist($id)
    {
        $artist = Artist::find($id);
        $name = $artist->user->name;
        $email = $artist->user->email;
        $tel = $artist->user->tel;
        return view('client.booking.contact', ['email' => $email, 'name' => $name, 'tel' => $tel]);
    }

    public function sendmail(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string', 'max:255'],
        ]);
        $data = array(
            'name' => $request->cname,
            'tel' =>$request->tel,
            'content' => $request->description
        );
        Mail::send('mail2', $data, function($message) use($request) {
            $message->to($request->email)->subject('Contact Email');
            $message->from(config('client.admin_email'));
        });
        return redirect()->route('client.booking')->with('success', 'Your message was successfully sent.');
    }

    public function delete($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('client.booking')->with('success', 'The booking is deleted successfully.');
    }

    public function filter1($id)
    {
        $artist = Artist::where('user_id', Auth::user()->id)->first();
        $bookings = Booking::whereIn('price_location_id', $artist->pricelocation->pluck('id'))->where('status_id', $id)->get();
        return view('client.booking.table', ['bookings' => $bookings]);
    }

    public function filter2()
    {
        $artist = Artist::where('user_id', Auth::user()->id)->first();
        $f = $_GET['from'];
        $t = $_GET['to'];

        $m = substr($f, 0, 2);
        $d = substr($f, 3, 2);
        $Y = substr($f, 6, 4);
        $mm = substr($t, 0, 2);
        $dd = substr($t, 3, 2);
        $YY = substr($t, 6, 4);

        $from = $Y.'-'.$m.'-'.$d.' 00:00:00';
        $to = $YY.'-'.$mm.'-'.$dd.' 00:00:00';
        if($t == ''){
            $bookings = Booking::whereIn('price_location_id', $artist->pricelocation->pluck('id'))
                                ->where('datetime1', '>=', $from)
                                ->get();
        } else if($f == ''){
            $bookings = Booking::whereIn('price_location_id', $artist->pricelocation->pluck('id'))
                                ->where('datetime1', '<=', $to)
                                ->get();
        } else {
            $bookings = Booking::whereIn('price_location_id', $artist->pricelocation->pluck('id'))
                                ->where('datetime1', '>=', $from)
                                ->where('datetime1', '<=', $to)
                                ->get();
        }
        return view('client.booking.table', ['bookings' => $bookings]);
    }
}
