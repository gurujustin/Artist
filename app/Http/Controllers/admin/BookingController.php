<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\PriceLocation;
use App\Models\PriceAddon;
use App\Models\Event;
use App\Models\Artist;
use Illuminate\Support\Facades\Validator;
use Mail;

class BookingController extends Controller
{
    function index(){
        $bookings = Booking::all();
        return view('admin.booking.index', ['bookings' => $bookings]);
    }

    function save(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'event' => ['required', 'string', 'max:255'],
            'time' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'venue' => ['required', 'string', 'max:1024'],
            'otherdetail' => ['required', 'string', 'max:1024'],
        ]);
        $booking = new Booking;
        $booking->price_location_id = $request['location'];
        if(Booking::count()){
            $refer = Booking::latest()->first()->id + 1;
            $referid = substr('000'.$refer, -4);
        } else {
            $referid = '0001';
        }
        $booking->booking_number = 'TME'.$referid;
        $booking->event_id = $request['event'];
        $booking->name = $request['name'];
        $booking->email = $request['email'];
        $booking->tel = $request['tel'];
        $booking->venue = $request['venue'];
        $booking->datetime = $request['date'].' '.$request['time'];
        $booking->other = $request['otherdetail'];
        $add_on_price = 0;
        if(isset($request->add_on)){
            foreach($request->add_on as $item){
                $add_on_price += PriceAddon::find($item)->price;
            }
            $booking->amount = PriceLocation::find($request['location'])->price + $add_on_price;
        } else {
            $booking->amount = PriceLocation::find($request['location'])->price;
        }
        $booking->status_id = '1';
        $booking->datetime1 = \DateTime::createFromFormat('m/d/Y h:i A', $request['date'].' '.$request['time'])->format('Y-m-d H:i:s');
        $booking->save();
        return redirect()->route('profiles.showpayment', ['id' => $booking->id]);
    }

    public function changelocation(Request $request)
    {
        $loc = $request->loc;
        return PriceLocation::find($loc)->price;
    }

    public function view(Request $request)
    {
        $id = $request->id;
        $booking = Booking::find($id);
        $eventtypes = Event::all();
        return view('admin.booking.edit', ['booking' => $booking, 'eventtypes' => $eventtypes]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'cname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'event_type' => ['required', 'string', 'max:255'],
            'datetime' => ['required', 'string', 'max:255'],
            'venue' => ['required', 'string', 'max:1024'],
            'other' => ['required', 'string', 'max:1024'],
        ]);
        $booking = Booking::find($request->id);
        $booking->name = $request->cname;
        $booking->tel = $request->tel;
        $booking->email = $request->email;
        $booking->price_location_id = $request->location;
        $booking->event_id = $request->event_type;
        $booking->venue = $request->venue;
        $booking->other = $request->other;
        $booking->datetime = $request->datetime;
        $booking->datetime1 = \DateTime::createFromFormat('m/d/Y h:i A', $request->datetime)->format('Y-m-d H:i:s');
        $booking->save();
        return redirect()->route('booking');
    }

    public function contactcustomer($id)
    {
        $booking = Booking::find($id);
        $email = $booking->email;
        $name = $booking->name;
        $tel = $booking->tel;
        return view('admin.booking.contact', ['email' => $email, 'name' => $name, 'tel' => $tel]);
    }

    public function contactartist($id)
    {
        $artist = Artist::find($id);
        $name = $artist->user->name;
        $email = $artist->user->email;
        $tel = $artist->user->tel;
        return view('admin.booking.contact', ['email' => $email, 'name' => $name, 'tel' => $tel]);
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
            $message->from(config('admin.admin_email'));
        });
        return redirect()->route('booking')->with('success', 'Your message was successfully sent.');
    }

    public function delete($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('booking')->with('success', 'The booking is deleted successfully.');
    }

    public function filter1($id)
    {
        $bookings = Booking::where('status_id', $id)->get();
        return view('admin.booking.table', ['bookings' => $bookings]);
    }

    public function filter2()
    {
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
            $bookings = Booking::where('datetime1', '>=', $from)
                                ->get();
        } else if($f == ''){
            $bookings = Booking::where('datetime1', '<=', $to)
                                ->get();
        } else {
            $bookings = Booking::where('datetime1', '>=', $from)
                                ->where('datetime1', '<=', $to)
                                ->get();
        }
        return view('admin.booking.table', ['bookings' => $bookings]);
    }
}
