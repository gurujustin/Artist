<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Act;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ArtistImage;
use App\Rules\MatchOldPassword;
use Mail;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = User::all();
        return view('admin.artists.artists')->with('artists', $artists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artists.add_artist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tel' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'status_id' => 2,
        ]);
        $senttoemail = User::latest()->first()->email;
        $data = [
            'description' => 'Your account was just created. Please wait to approve your account.',
        ];
        Mail::send('mail-message', $data, function($msg) use($senttoemail){
            $msg->to($senttoemail);
            $msg->subject('Your Account Was Created.');
            $msg->from(config('admin.admin_email'));
        });
        return redirect()->route('artists.index')->with('success', 'New client was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show($artist)
    {
        $artist_data = User::find($artist);
        return view('admin.artists.edit_artist', [
            'artist' => $artist_data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $artist)
    {        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'current_password' => ['required'],
        ]);
        if (!Hash::check($request->current_password, User::find($artist)->password)) {
            return back()->with('error', 'Current password does not match');
        }
        User::find($artist)->update([
            'name' => $request->name,
            'tel' => $request->tel,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('artists.index')->with('success', 'The client was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy($artist)
    {
        User::find($artist)->delete();
        return redirect()->back()->with('success', 'The client was successfully removed.');
    }

    /**
     * Top artists
     */
    public function topArtists(){
        $users = User::where('role_id', 3)->where('status_id', 1)->get();
        return view('admin.artists.top_artists')->with('artists', $users);

    }

    public function blockartist(Request $request){
        $user = User::find($request->id);
        $senttoemail = $user->email;
        if($user->status_id == 1){
            $user->update([
                'status_id' => 2
            ]);
            $data = [
                'description' => 'Your account was just disabled.',
            ];
            Mail::send('mail-message', $data, function($msg) use($senttoemail){
                $msg->to($senttoemail);
                $msg->subject('Your Account Was disabled.');
                $msg->from(config('admin.admin_email'));
            });
            return 2;
        }
        else{
            $user->update([
                'status_id' => 1
            ]);
            $data = [
                'description' => 'Your account was just approved.',
            ];
            Mail::send('mail-message', $data, function($msg) use($senttoemail){
                $msg->to($senttoemail);
                $msg->subject('Your Account Was Approved.');
                $msg->from(config('admin.admin_email'));
            });
            return 1;
        }
    }
    
}
