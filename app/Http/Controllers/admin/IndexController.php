<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use App\Models\User;

class IndexController extends Controller
{
    /**
     * admin dashboard
     *
     * @return void
     */

    public function index(){
        return view('admin.dashboard');
    }

    public function update(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'current_password' => ['required', new MatchOldPassword],
        ]);
        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::logout();
        return back();    
    }
    
    public function setting(){
        return view('admin.setting');
    }

    public function contact($artist){
        $artist = User::find($artist);
        return view('contact_client', [
            'artist' => $artist,
        ]);
    }

    public function addadmin(Request $request){
        User::find($request->id)->update([
            'role_id' => 1,
        ]);
        return back()->with('success', 'New Admin was successfully added.');
    }

    public function removeadmin(Request $request){
        User::find($request->id)->update([
            'role_id' => 2,
            'roles' => '',
        ]);
        return back()->with('success', 'New Admin was successfully removed from admin.');
    }

    public function showrole(Request $request){
        $role = User::find($_GET['id'])->roles;
        $roles = explode(',', $role);
        return $roles;
    }

    public function editrole(Request $request)
    {
        $role = implode(',', $request->role);
        User::find($request->id)->update([
            'roles' => $role,
        ]);
        return redirect()->back()->with('success', 'The role was successfullly updated.');
    }
}
