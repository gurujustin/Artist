<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Act;
use App\Models\Country;
use App\Models\Location;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homepage(){
        $events = Event::all();
        $locations = Location::all();
        $acts = Act::all();
        $countries = Country::all();
        return view('homepage', [
            'events' => $events,
            'locations' => $locations,
            'acts' => $acts,
            'countries' => $countries,
        ]);
    }

    public function quote(){
        $events = Event::all();
        $locations = Location::all();
        $acts = Act::all();
        $countries = Country::all();
        return view('quote', [
            'events' => $events,
            'locations' => $locations,
            'acts' => $acts,
            'countries' => $countries,
        ]);
    }

    public function sendquote(Request $request) {
        $request->validate([
            'event' => ['required', 'string', 'max:255'],
            'act' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'eventdate' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max: 255'],
            'name' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        Message::create([
            'event_id' => $request->event,
            'location_id' => $request->location,
            'act_id' => $request->act,
            'event_date' => $request->eventdate,
            'content' => $request->content,
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
        ]);

        $message = Message::latest()->first();
        $data = [
            'event' => $message->event->name,
            'location' => $message->location->name,
            'act' => $message->act->name,
            'content' => $message->content,
            'event_date' => $message->event_date,
            'name' => $message->name,
            'tel' => $message->tel,
            'email' => $message->email,
        ];
        $fromemail = $message->email;

        Mail::send('mail', $data, function($msg) use($fromemail){
            $msg->to(config('admin.admin_email'));
            $msg->subject('Artist requirement');
            $msg->from($fromemail);
        });
        
        return view('quote_sent');
    }

}
