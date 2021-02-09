<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class SupportController extends Controller
{
    public function index()
    {
        return view('client.support.index');
    }

    public function send(Request $request)
    {
        $email = User::find(Auth::user()->id)->email;
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        $data = array(
            'subject' => $request->subject,
            'content' => $request->description
        );
        Mail::send('mail3', $data, function($message) use($email) {
            $message->to(config('admin.admin_email'))->subject('Contact Email');
            $message->from($email);
        });
        return redirect()->route('client.support.index')->with('success', 'Your mail was successfully sent.');
    }
}
