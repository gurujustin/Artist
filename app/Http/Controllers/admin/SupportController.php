<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        return view('admin.support.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        $data = array(
            'subject' => $request->subject,
            'content' => $request->description
        );
        Mail::send('mail3', $data, function($message) use($request) {
            $message->to('stepandev007@gmail.com')->subject('Contact Email');
            $message->from(config('admin.admin_email'));
        });
        return redirect()->route('support.index')->with('success', 'Your mail was successfully sent.');
    }
}
