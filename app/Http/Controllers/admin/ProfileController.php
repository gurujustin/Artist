<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\User;
use App\Models\ArtistVideo;
use App\Models\ArtistImage;
use App\Models\ArtistMusic;
use App\Models\PriceStandardInfo;
use App\Models\PriceLocation;
use App\Models\PriceAddon;
use App\Models\Location;
use App\Models\Event;
use App\Models\Act;
use App\Models\ArtistRepertorie;
use App\Models\Booking;

class ProfileController extends Controller
{
    public function createprofile(){
        $users = User::where('status_id', 1)->get();
        $locations = Location::all();
        $acts = Act::all();
        $events = Event::all();
        return view('admin.artists.profilecreate', [
            'users' => $users,
            'locations' => $locations,
            'acts' => $acts,
            'events' => $events,
        ]);
    }

    public function storeprofile(Request $request){
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'exp' => ['required', 'string', 'max:255'],
            'location' => ['required'],
            'event' => ['required'],
            'act' => ['required'],
        ]);
        Artist::create([
            'fullname' => $request->fullname,
            'user_id' => $request->user,
            'exp' => $request->exp,
            'location_id' => $request->location,
            'event_id' => $request->event,
            'act_id' => $request->act,
            'website' => $request->website,
        ]);
        return redirect()->route('allprofiles')->with('success', 'New profile was successfully created.');

    }

    public function all(){
        $profiles = Artist::where('blocked', 'active')->get();
        return view('admin.artists.allprofiles')->with('profiles', $profiles);
    }

    public function pendings(){
        $profiles = Artist::where('blocked', 'blocked')->get();
        return view('admin.artists.pendingprofiles')->with('profiles', $profiles);
    }

    public function top(){
        $profiles = Artist::where('blocked', 'active')->where('role_id', 2)->get();
        return view('admin.artists.topprofiles')->with('profiles', $profiles);
    }

    public function activeprofile($id){
        Artist::find($id)->update([
            'blocked' => 'active',
        ]);
        return redirect()->back()->with('success', 'The profile was successfully actived.');
    }

    public function downgradeprofile($id){
        Artist::find($id)->update([
            'role_id' => 1,
        ]);
        return redirect()->back()->with('success', 'The profile was successfully downgraded.');
    }

    public function blockprofile($id){
        Artist::find($id)->update([
            'blocked' => 'blocked',
        ]);
        return redirect()->back()->with('success', 'The profile was successfully blocked.');
    }

    public function upgradeprofile($id){
        Artist::find($id)->update([
            'role_id' => 2,
        ]);
        return redirect()->back()->with('success', 'The profile was successfully upgraded.');
    }

    public function removeprofile($id){
        Artist::find($id)->delete();
        return redirect()->back()->with('success', 'The profile was successfully removed.');
    }

    public function changestatus($id){
        $profile = Artist::find($id);
        if($profile->status_id == 1){
            $profile->update([
                'status_id' => 2
            ]);
            return 2;
        }
        else{
            $profile->update([
                'status_id' => 1
            ]);
            return 1;
        }

    }

    public function index($user_id){
        $profiles = Artist::where('user_id', $user_id)->get();
        $artist = User::find($user_id);
        return view('admin.artists.profiles', [
            'profiles' => $profiles,
            'artist' => $artist,
        ]);
    }

    public function create($artist){
        $artist_data = User::find($artist);
        $events = Event::all();
        $acts = Act::all();
        $locations = Location::all();
        return view('admin.artists.createprofile', [
            'artist' => $artist_data,
            'events' => $events,
            'acts' => $acts,
            'locations' => $locations,
        ]);
    }

    public function store($artist, Request $request){
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'exp' => ['required', 'string', 'max:255'],
            'location' => ['required'],
            'event' => ['required'],
            'act' => ['required'],
        ]);
        Artist::create([
            'fullname' => $request->fullname,
            'user_id' => $artist,
            'exp' => $request->exp,
            'location_id' => $request->location,
            'event_id' => $request->event,
            'act_id' => $request->act,
            'website' => $request->website,
        ]);
        $profile = Artist::latest()->first();
        $artist = User::find($artist);

        return redirect()->route('profiles.edit', [
            'artist' => $artist->id,
            'profileid' => $profile->id,
        ])->with('success', 'New profile was successfully created.');
    }

    public function edit($artist, $profileid){
        $profile = Artist::find($profileid);
        $events = Event::all();
        $acts = Act::all();
        $locations = Location::all();
        return view('admin.artists.editprofile', [
            'profile' => $profile,
            'events' => $events,
            'acts' => $acts,
            'locations' => $locations,
        ]);
    }

    public function update($artist, $profileid, Request $request){
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'exp' => ['required', 'string', 'max:255'],
            'location' => ['required'],
            'event' => ['required'],
            'act' => ['required'],
        ]);
        Artist::find($profileid)->update([
            'fullname' => $request->fullname,
            'exp' => $request->exp,
            'location_id' => $request->location,
            'event_id' => $request->event,
            'act_id' => $request->act,
            'website' => $request->website,
        ]);
        return redirect()->back();
    }

    public function destroy($artist, $profileid, Request $request){
        Artist::find($profileid)->delete();
        $artist_data = User::find($artist);
        return redirect()->route('profiles', ['artist' => $artist])
                ->with('artist', $artist_data)
                ->with('success', 'The profile was successfully removed.');

    }

    public function showVideo($artist, $profileid)
    {
        $artist_data = Artist::find($profileid);
        $videos = ArtistVideo::where('artist_id', $profileid)->get();

        return view('admin.artists.video.show', [
            'videos' => $videos,
            'artist' => $artist_data,
        ]);
    }

    public function uploadVideo(Request $request, $artist, $profileid)
    {
        $request->validate([
            'video' => ['required', 'string', 'max:255'],
        ]);
        
        ArtistVideo::create([
            'url' => $request->video,
            'artist_id' => $profileid,
        ]);
        return back()->with('success', 'The video url was successfully added.');
    }

    public function removevideo(Request $request){
        ArtistVideo::find($request->id)->delete();
        return back()->with('success', 'The video url was successfully removed');
    }

    public function setvideo(Request $request, $artist, $profileid){
        ArtistVideo::where('artist_id', $profileid)->update([
            'primary' => 0,
        ]);
        ArtistVideo::find($request->id)->update([
            'primary' => 1,
        ]);
        return back();

    }

    public function showsocial($artist, $profileid)
    {
        $artist_data = Artist::find($profileid);
        return view('admin.artists.social.show', [
            'artist' => $artist_data,
        ]);
    }

    public function uploadsocial(Request $request, $artist, $profileid)
    {
        $request->validate([
            'facebook' => ['required', 'string', 'max:255'],
            'twitter' => ['required', 'string', 'max:255'],
            'youtube' => ['required', 'string', 'max:255'],
            'instagram' => ['required', 'string', 'max:255'],
            'linkedin' => ['required', 'string', 'max:255'],
        ]);

        Artist::find($profileid)->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);
        return back()->with('success', 'Info successfully saved');
    }

    public function showimage($artist, $profileid)
    {
        $artist_data = Artist::find($profileid);
        $pageimage = ArtistImage::where('artist_id', $profileid)->where('type', 'pageimage')->get();
        $repimage = ArtistImage::where('artist_id', $profileid)->where('type', 'repimage')->get();
        $reviewimage = ArtistImage::where('artist_id', $profileid)->where('type', 'reviewimage')->get();
        $galleryimage = ArtistImage::where('artist_id', $profileid)->where('type', 'galleryimage')->get();

        return view('admin.artists.image.show', [
            'pageimage' => $pageimage,
            'repimage' => $repimage,
            'reviewimage' => $reviewimage,
            'artist' => $artist_data,
            'galleryimage' => $galleryimage,
        ]);
    }
    public function uploadPageImage(Request $request, $artist, $profileid)
    {
        $request->validate([
            'pageimage' => 'required|mimes:jpeg,jpg,png,gif|max:15000',
        ]);
        $fileName = time() . '.' . $request->pageimage->extension();
        if (ArtistImage::where('artist_id', $profileid)->where('type', 'pageimage')->exists()) {
            unlink(public_path('uploads/' . ArtistImage::where('artist_id', $profileid)->where('type', 'pageimage')->value('url')));
            ArtistImage::where('artist_id', $profileid)->where('type', 'pageimage')->update([
                'url' => $fileName,
                'artist_id' => $profileid,
                'type' => 'pageimage',
            ]);
        } else {
            ArtistImage::create([
                'url' => $fileName,
                'artist_id' => $profileid,
                'type' => 'pageimage',
            ]);
        }
        $path = $request->pageimage->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
    public function uploadRepImage(Request $request, $artist, $profileid)
    {
        $request->validate([
            'repimage' => 'required|mimes:jpeg,jpg,png,gif|max:500000',
        ]);
        $fileName = time() . '.' . $request->repimage->extension();
        if (ArtistImage::where('artist_id', $profileid)->where('type', 'repimage')->exists()) {
            unlink(public_path('uploads/' . ArtistImage::where('artist_id', $profileid)->where('type', 'repimage')->value('url')));
            ArtistImage::where('artist_id', $profileid)->where('type', 'repimage')->update([
                'url' => $fileName,
                'artist_id' => $profileid,
                'type' => 'repimage',
            ]);
        } else {
            ArtistImage::create([
                'url' => $fileName,
                'artist_id' => $profileid,
                'type' => 'repimage',
            ]);
        }

        $request->repimage->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
    public function uploadReviewImage(Request $request, $artist, $profileid)
    {
        $request->validate([
            'reviewimage' => 'required|mimes:jpeg,jpg,png,gif|max:500000',
        ]);
        $fileName = time() . '.' . $request->reviewimage->extension();
        if (ArtistImage::where('artist_id', $profileid)->where('type', 'reviewimage')->exists()) {
            unlink(public_path('uploads/' . ArtistImage::where('artist_id', $profileid)->where('type', 'reviewimage')->value('url')));
            ArtistImage::where('artist_id', $profileid)->where('type', 'reviewimage')->update([
                'url' => $fileName,
                'artist_id' => $profileid,
                'type' => 'reviewimage',
            ]);
        } else {
            ArtistImage::create([
                'url' => $fileName,
                'artist_id' => $profileid,
                'type' => 'reviewimage',
            ]);
        }

        $request->reviewimage->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
    public function uploadGalleryImage(Request $request, $artist, $profileid)
    {
        $request->validate([
            'galleryimage' => 'required|mimes:jpeg,jpg,png,gif|max:500000',
            'gallerytitle' => ['required', 'string', 'max:255'],
            'galleryalt' => ['required', 'string', 'max:255']
        ]);
        $fileName = time() . '.' . $request->galleryimage->extension();
        ArtistImage::create([
            'url' => $fileName,
            'artist_id' => $profileid,
            'type' => 'galleryimage',
            'title' => $request->gallerytitle,
            'alt' => $request->galleryalt,
        ]);
        $request->galleryimage->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
    public function removeGallery(Request $request, $profileid)
    {
        unlink(public_path('uploads/' . ArtistImage::find($request->id)->url));
        ArtistImage::where('id', $request->id)->delete();
        return 1;
    }

    public function showMusic($artist, $profileid)
    {
        $artist_data = Artist::find($profileid);
        $musics = ArtistMusic::where('artist_id', $profileid)->get();

        return view('admin.artists.music.show', [
            'musics' => $musics,
            'artist' => $artist_data,
        ]);
    }

    public function uploadMusic(Request $request, $artist, $profileid)
    {
        $request->validate([
            'music' => 'required|mimes:mp3|max:500000',
            'musictitle' => ['required', 'string', 'max:255'],
        ]);
        $fileName = time() . '.' . $request->music->extension();
        ArtistMusic::create([
            'url' => $fileName,
            'artist_id' => $profileid,
            'title' => $request->musictitle,
        ]);
        $request->music->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }

    public function removemusic(Request $request, $artist, $profileid){
        unlink(public_path('uploads/' . ArtistMusic::find($request->id)->value('url')));
        ArtistMusic::find($request->id)->delete();        
        return back()->with('success', 'The music was successfullly removed');
    }

    public function showpricing($artist, $profileid)
    {
        $standardprice = PriceStandardInfo::where('artist_id', $profileid)->get();
        $addonprices = PriceAddon::where('artist_id', $profileid)->get();
        $locationprices = PriceLocation::where('artist_id', $profileid)->get();
        $artist_data = Artist::find($profileid);
        $locations = Location::all();


        return view('admin.artists.pricing.show', [
            'standardprice' => $standardprice,
            'addonprices' => $addonprices,
            'locationprices' => $locationprices,
            'artist' => $artist_data,
            'locations' => $locations,
        ]);
    }

    public function addlocationprice($artist, Request $request, $profileid)
    {
        $locations = Location::all();
        foreach ($locations as $location) {
            $locationprice = PriceLocation::firstOrNew(['location_id' => $location->id, 'artist_id' => $profileid]);
            $locationprice->artist_id =  $profileid;
            $locationprice->location_id =  $location->id;
            $locationprice->price =  $request[$location->id];
            if($request[$location->id] == NULL){
                $locationprice->price =  0;
            }
            $locationprice->save();
        }
        return redirect()->back();
    }

    public function updatealllocation($artist, Request $request, $profileid)
    {
        $request->validate([
            'initprice' => ['required', 'integer'],
        ]);
        $locations = Location::all();
        foreach ($locations as $location) {
            $locationprice = PriceLocation::firstOrNew(['location_id' => $location->id, 'artist_id' => $profileid]);
            // dd($locationprice);
            $locationprice->artist_id =  $profileid;
            $locationprice->location_id =  $location->id;
            $locationprice->price =  $request->initprice;
            $locationprice->save();
        }
        return redirect()->back();
    }

    public function addaddonprice($artistid, Request $request, $profileid)
    {
        $request->validate([
            'addonprice' => ['required', 'integer'],
            'addontype' => ['required', 'string']
        ]);
        PriceAddon::create([
            'artist_id' => $profileid,
            'type' => $request->addontype,
            'price' => $request->addonprice,
        ]);
        return redirect()->back();
    }

    public function addstandardinfo($artistid, Request $request, $profileid){
        $request->validate([
            'length' => ['required', 'string'],
            'time' => ['required', 'string'],
            'lineup' => ['required', 'string'],
        ]);

        $pricestandardinfo = PriceStandardInfo::firstOrNew(['artist_id' => $profileid]);
            $pricestandardinfo->artist_id =  $profileid;
            $pricestandardinfo->length =  $request->length;
            $pricestandardinfo->time =  $request->time;
            $pricestandardinfo->lineup =  $request->lineup;
            $pricestandardinfo->save();

        return redirect()->back();
    }

    public function editaddonprice(Request $request, $profileid){
        PriceAddon::where(['id' => $request->addonpriceid, 'artist_id' => $request->artistid])->update([
            'price' => $request->addonprice,
        ]);
        return 1;

    }

    public function deleteaddonprice(Request $request){
        // dd($request);
        PriceAddon::where(['id' => $request->addonpriceid, 'artist_id' => $request->artistid])->delete();
        return 1;

    }

    public function showrepertorie($artistid, $profileid){
        $artist = Artist::find($profileid);
        $repertories = ArtistRepertorie::where('artist_id', $profileid)->get();

        return view('admin.artists.repertorie.show', [
            'artist' => $artist,
            'repertories' => $repertories,
        ]);
    }

    public function addrepertorie($artistid, Request $request, $profileid)
    {
        // dd($request);
        $request->validate([
            'janre' => ['required', 'string'],
            'content' => ['required', 'string']
        ]);
        ArtistRepertorie::create([
            'artist_id' => $profileid,
            'janre' => $request->janre,
            'content' => json_encode($request->content),
        ]);
        return redirect()->back()->with('success', 'Info successfully saved.');
    }

    public function editrepertorie(Request $request){
        // dd($request);
        ArtistRepertorie::where(['id' => $request->repertorieid, 'artist_id' => $request->artistid])->update([
            'content' => json_encode($request->content),
        ]);
        return 1;

    }

    public function deleterepertorie(Request $request){
        // dd($request);
        ArtistRepertorie::where(['id' => $request->repertorieid, 'artist_id' => $request->artistid])->delete();
        return 1;

    }

    public function booking(Request $request)
    {
        $id = $request->id;
        $artist = Artist::find($id);
        $events = Event::all();
        return view('admin.booking.create', ['artist' => $artist, 'events' => $events]);
    }

    public function showpayment($id)
    {
        $booking = Booking::find($id);
        return view('admin.artists.payment', ['referid' => $booking->booking_number, 'amount' => $booking->amount]);
    }

    public function paystatus(Request $request)
    {
        $booking = Booking::where('booking_number', $request->referid)->first();
        $booking->status_id = 2;
        $booking->paid_datetime = date("Y-m-d H:i:s");
        $booking->save();
        return redirect()->route('booking')->with('success', 'Payment is successfully completed.');
    }

    public function changestatusprofile($artist, $profileid){
        $profile = Artist::find($profileid);
        $profile->status_id = 3 - $profile->status_id;
        $profile->save();
        return back();
    }

    public function artistsdetail($artist, $profileid){
        return view('admin.artists.artistsdetail', [
            'profileid' => $profileid,
        ]);
    }
}
