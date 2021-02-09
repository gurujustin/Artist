<?php

namespace App\Http\Controllers\client;

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
use Auth;

class ProfileController extends Controller
{
    public function index(){
        $profiles = Artist::where('user_id', Auth::id())->get();
        return view('client.artists.index', [
            'profiles' => $profiles,
        ]);
    }

    public function create(){
        $events = Event::all();
        $acts = Act::all();
        $locations = Location::all();
        return view('client.artists.create', [
            'events' => $events,
            'acts' => $acts,
            'locations' => $locations,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'exp' => ['required', 'string', 'max:255'],
            'location' => ['required'],
            'event' => ['required'],
            'act' => ['required'],
        ]);
        Artist::create([
            'fullname' => $request->fullname,
            'user_id' => Auth::id(),
            'exp' => $request->exp,
            'location_id' => $request->location,
            'event_id' => $request->event,
            'act_id' => $request->act,
            'website' => $request->website,
            'status_id' => 2,
        ]);
        $profile = Artist::latest()->first();

        return redirect()->route('client.profiles.edit', [
            'id' => $profile->id,
        ])->with('success', 'New profile was successfully created.');
    }

    public function edit($id){
        $profile = Artist::find($id);
        $events = Event::all();
        $acts = Act::all();
        $locations = Location::all();
        return view('client.artists.edit', [
            'profile' => $profile,
            'events' => $events,
            'acts' => $acts,
            'locations' => $locations,
        ]);
    }

    public function update($id, Request $request){
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'exp' => ['required', 'string', 'max:255'],
            'location' => ['required'],
            'event' => ['required'],
            'act' => ['required'],
        ]);
        Artist::find($id)->update([
            'fullname' => $request->fullname,
            'exp' => $request->exp,
            'location_id' => $request->location,
            'event_id' => $request->event,
            'act_id' => $request->act,
            'website' => $request->website,
        ]);
        return redirect()->back()->with('success', 'The Profile was successfully updated.');
    }

    public function destroy($id, Request $request){
        Artist::find($id)->delete();
        return redirect()->route('client.profiles')
                ->with('success', 'The profile was successfully removed.');

    }

    public function showVideo($id)
    {
        $videos = ArtistVideo::where('artist_id', $id)->get();
        return view('client.artists.video.show', [
            'videos' => $videos,
            'id' => $id,
        ]);
    }

    public function uploadVideo(Request $request, $id)
    {
        $request->validate([
            'video' => ['required', 'string', 'max:255'],
        ]);
        ArtistVideo::create([
            'url' => $request->video,
            'artist_id' => $id,
        ]);
        return back()->with('success', 'The video url was successfully added.');
    }

    public function removevideo(Request $request){
        ArtistVideo::find($request->id)->delete();
        return back()->with('success', 'The video url was successfully removed');
    }

    public function setvideo(Request $request, $id){
        ArtistVideo::where('artist_id', $id)->update([
            'primary' => 0,
        ]);
        ArtistVideo::find($request->id)->update([
            'primary' => 1,
        ]);
        return back();

    }

    public function showsocial($id)
    {
        return view('client.artists.social.show', [
            'id' => $id,
        ]);
    }

    public function uploadsocial(Request $request, $id)
    {
        $request->validate([
            'facebook' => ['required', 'string', 'max:255'],
            'twitter' => ['required', 'string', 'max:255'],
            'youtube' => ['required', 'string', 'max:255'],
            'instagram' => ['required', 'string', 'max:255'],
            'linkedin' => ['required', 'string', 'max:255'],
        ]);

        Artist::find($id)->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);
        return back()->with('success', 'Info successfully saved');
    }

    public function showimage($id)
    {
        $pageimage = ArtistImage::where('artist_id', $id)->where('type', 'pageimage')->get();
        $repimage = ArtistImage::where('artist_id', $id)->where('type', 'repimage')->get();
        $reviewimage = ArtistImage::where('artist_id', $id)->where('type', 'reviewimage')->get();
        $galleryimage = ArtistImage::where('artist_id', $id)->where('type', 'galleryimage')->get();

        return view('client.artists.image.show', [
            'pageimage' => $pageimage,
            'repimage' => $repimage,
            'reviewimage' => $reviewimage,
            'galleryimage' => $galleryimage,
            'id' => $id,
        ]);
    }
    public function uploadPageImage(Request $request, $id)
    {
        $request->validate([
            'pageimage' => 'required|mimes:jpeg,jpg,png,gif|max:15000',
        ]);
        $fileName = time() . '.' . $request->pageimage->extension();
        if (ArtistImage::where('artist_id', $id)->where('type', 'pageimage')->exists()) {
            unlink(public_path('uploads/' . ArtistImage::where('artist_id', $id)->where('type', 'pageimage')->value('url')));
            ArtistImage::where('artist_id', $id)->where('type', 'pageimage')->update([
                'url' => $fileName,
                'artist_id' => $id,
                'type' => 'pageimage',
            ]);
        } else {
            ArtistImage::create([
                'url' => $fileName,
                'artist_id' => $id,
                'type' => 'pageimage',
            ]);
        }
        $path = $request->pageimage->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
    public function uploadRepImage(Request $request, $id)
    {
        $request->validate([
            'repimage' => 'required|mimes:jpeg,jpg,png,gif|max:500000',
        ]);
        $fileName = time() . '.' . $request->repimage->extension();
        if (ArtistImage::where('artist_id', $id)->where('type', 'repimage')->exists()) {
            unlink(public_path('uploads/' . ArtistImage::where('artist_id', $id)->where('type', 'repimage')->value('url')));
            ArtistImage::where('artist_id', $id)->where('type', 'repimage')->update([
                'url' => $fileName,
                'artist_id' => $id,
                'type' => 'repimage',
            ]);
        } else {
            ArtistImage::create([
                'url' => $fileName,
                'artist_id' => $id,
                'type' => 'repimage',
            ]);
        }

        $request->repimage->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
    public function uploadReviewImage(Request $request, $id)
    {
        $request->validate([
            'reviewimage' => 'required|mimes:jpeg,jpg,png,gif|max:500000',
        ]);
        $fileName = time() . '.' . $request->reviewimage->extension();
        if (ArtistImage::where('artist_id', $id)->where('type', 'reviewimage')->exists()) {
            unlink(public_path('uploads/' . ArtistImage::where('artist_id', $id)->where('type', 'reviewimage')->value('url')));
            ArtistImage::where('artist_id', $id)->where('type', 'reviewimage')->update([
                'url' => $fileName,
                'artist_id' => $id,
                'type' => 'reviewimage',
            ]);
        } else {
            ArtistImage::create([
                'url' => $fileName,
                'artist_id' => $id,
                'type' => 'reviewimage',
            ]);
        }

        $request->reviewimage->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }
    public function uploadGalleryImage(Request $request, $id)
    {
        $request->validate([
            'galleryimage' => 'required|mimes:jpeg,jpg,png,gif|max:500000',
            'gallerytitle' => ['required', 'string', 'max:255'],
            'galleryalt' => ['required', 'string', 'max:255']
        ]);
        $fileName = time() . '.' . $request->galleryimage->extension();
        ArtistImage::create([
            'url' => $fileName,
            'artist_id' => $id,
            'type' => 'galleryimage',
            'title' => $request->gallerytitle,
            'alt' => $request->galleryalt,
        ]);
        $request->galleryimage->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('scroll', 'galleryimagesection')
            ->with('file', $fileName);
    }
    public function removeGallery(Request $request, $id)
    {
        unlink(public_path('uploads/' . ArtistImage::find($request->id)->url));
        ArtistImage::where('id', $request->id)->delete();
        return 1;
    }

    public function showMusic($id)
    {
        $musics = ArtistMusic::where('artist_id', $id)->get();

        return view('client.artists.music.show', [
            'musics' => $musics,
            'id' => $id,
        ]);
    }

    public function uploadMusic(Request $request, $id)
    {
        $request->validate([
            'music' => 'required|mimes:mp3|max:500000',
            'musictitle' => ['required', 'string', 'max:255'],
        ]);
        $fileName = time() . '.' . $request->music->extension();
        ArtistMusic::create([
            'url' => $fileName,
            'artist_id' => $id,
            'title' => $request->musictitle,
        ]);
        $request->music->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }

    public function removemusic(Request $request, $id){
        unlink(public_path('uploads/' . ArtistMusic::find($request->id)->value('url')));
        ArtistMusic::find($request->id)->delete();
        return back()->with('success', 'The music was successfullly removed');
    }

    public function showpricing($id)
    {
        $standardprice = PriceStandardInfo::where('artist_id', $id)->get();
        $addonprices = PriceAddon::where('artist_id', $id)->get();
        $locationprices = PriceLocation::where('artist_id', $id)->get();
        $locations = Location::all();
        return view('client.artists.pricing.show', [
            'standardprice' => $standardprice,
            'addonprices' => $addonprices,
            'locationprices' => $locationprices,
            'locations' => $locations,
            'id' => $id,
        ]);
    }

    public function addlocationprice(Request $request, $id)
    {
        $locations = Location::all();
        foreach ($locations as $location) {
            $locationprice = PriceLocation::firstOrNew(['location_id' => $location->id, 'artist_id' => $id]);
            $locationprice->artist_id =  $id;
            $locationprice->location_id =  $location->id;
            $locationprice->price =  $request[$location->id];
            if($request[$location->id] == NULL){
                $locationprice->price =  0;
            }
            $locationprice->save();
        }
        return redirect()->back();
    }

    public function updatealllocation(Request $request, $id)
    {
        $request->validate([
            'initprice' => ['required', 'integer'],
        ]);
        $locations = Location::all();
        foreach ($locations as $location) {
            $locationprice = PriceLocation::firstOrNew(['location_id' => $location->id, 'artist_id' => $id]);
            // dd($locationprice);
            $locationprice->artist_id =  $id;
            $locationprice->location_id =  $location->id;
            $locationprice->price =  $request->initprice;
            $locationprice->save();
        }
        return redirect()->back();
    }

    public function addaddonprice(Request $request, $id)
    {
        $request->validate([
            'addonprice' => ['required', 'integer'],
            'addontype' => ['required', 'string']
        ]);
        PriceAddon::create([
            'artist_id' => $id,
            'type' => $request->addontype,
            'price' => $request->addonprice,
        ]);
        return redirect()->back();
    }

    public function addstandardinfo(Request $request, $id){
        $request->validate([
            'length' => ['required', 'string'],
            'time' => ['required', 'string'],
            'lineup' => ['required', 'string'],
        ]);

        $pricestandardinfo = PriceStandardInfo::firstOrNew(['artist_id' => $id]);
            $pricestandardinfo->artist_id =  $id;
            $pricestandardinfo->length =  $request->length;
            $pricestandardinfo->time =  $request->time;
            $pricestandardinfo->lineup =  $request->lineup;
            $pricestandardinfo->save();

        return redirect()->back();
    }

    public function editaddonprice(Request $request, $id){
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

    public function showrepertorie($id){
        $repertories = ArtistRepertorie::where('artist_id', $id)->get();

        return view('client.artists.repertorie.show', [
            'id' => $id,
            'repertories' => $repertories,
        ]);
    }

    public function addrepertorie(Request $request, $id)
    {
        $request->validate([
            'janre' => ['required', 'string'],
            'content' => ['required', 'string']
        ]);
        ArtistRepertorie::create([
            'artist_id' => $id,
            'janre' => $request->janre,
            'content' => json_encode($request->content),
        ]);
        return redirect()->back()->with('success', 'Info successfully saved.');
    }

    public function editrepertorie(Request $request){
        ArtistRepertorie::where(['id' => $request->repertorieid, 'artist_id' => $request->artistid])->update([
            'content' => json_encode($request->content),
        ]);
        return 1;

    }

    public function deleterepertorie(Request $request){
        ArtistRepertorie::where(['id' => $request->repertorieid, 'artist_id' => $request->artistid])->delete();
        return 1;

    }

    public function artistsdetail($id){
        return view('client.artists.artistsdetail', [
            'id' => $id,
        ]);
    }
}