<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Mail;
use Auth;
use App\Models\Artist;
use App\Models\User;

class MessageController extends Controller
{
    private $role;

    public function index(){
        $this->role = Auth::user()->role->name;
        $messages = Message::where('to', Auth::user()->email)
                                ->where('trashed', 0)
                                ->where('owner', 1)
                                ->get();
        return view($this->role.'.message.index', ['messages' => $messages]);
    }

    public function show($id){
        $this->role = Auth::user()->role->name;
        $message = Message::find($id);
        $message->update([
            'checked' => 1,
        ]);
        return view($this->role.'.message.show')->with('message', $message);
    }    

    public function create(){
        $this->role = Auth::user()->role->name;
        $messages = Message::where('to', Auth::user()->email)
                            ->where('trashed', 0)
                            ->where('owner', 1)
                            ->get();
        return view($this->role.'.message.create', ['messages' => $messages]);

    }

    public function reply($id){

        $this->role = Auth::user()->role->name;
        $msg = Message::find($id);
        return view($this->role.'.message.reply', ['msg' => $msg]);

    }

    public function sent(){
        $this->role = Auth::user()->role->name;
        $messages = Message::where('trashed', 0)
                            ->where('from', Auth::user()->email)
                            ->where('to', '!=', NULL)
                            ->where('owner', 1)
                            ->get();
        return view($this->role.'.message.sent')->with('messages', $messages);

    }

    public function draft(){
        $this->role = Auth::user()->role->name;
        $messages = Message::where('from', Auth::user()->email)
                            ->where('draft', 1)
                            ->where('to', NULL)
                            ->where('owner', 1)
                            ->get();
        return view($this->role.'.message.draft')->with('messages', $messages);

    }

    public function trash(){
        $this->role = Auth::user()->role->name;
        $messages = Message::where('trashed', 1)
                            ->where('owner', 1)
                            ->Where(function($query){
                                $query->Where('to', Auth::user()->email)
                                    ->orWhere('from', Auth::user()->email);
                            })->get();    
        return view($this->role.'.message.trash')->with('messages', $messages);
    }

    public function sendtrash(Request $request){
        $ids = $request->ids;
        foreach($ids as $id){
            Message::find($id)->update([
                'trashed' => 1
            ]);
        }
        return back()->with('message', 'The messages are successfully trashed.');
    }

    public function recovertrash(Request $request){
        $ids = $request->ids;
        foreach($ids as $id){
            Message::find($id)->update([
                'trashed' => 0,
            ]);
        }
        return back()->with('message', 'The messages are successfully recovered.');
    }

    public function remove(Request $request){
        $ids = $request->ids;
        foreach($ids as $id){
            Message::find($id)->delete();
        }
        return back()->with('message', 'The messages are successfully removed.');
    }

    public function checked($id){
        $message = Message::find($id);
        $message->update([
            'checked' => 1-$message->checked,
        ]);
        return 1;
    }

    public function send(Request $request){

        $request->validate([
            'to' => 'required|email|max:255',
            'content' => 'required',
        ]);
        $fileName = '';
        if($request->file){
            $fileName = time() . '.' . $request->file->extension();
            $path = $request->file->move(public_path('uploads'), $fileName);
        }       

        Message::create([
            'from' => Auth::user()->email,
            'to' => $request->to,
            'subject' => $request->subject,
            'content' => $request->content,
            'draft' => 0,
            'file' => $fileName,
            'owner' => 0,
        ]);
        Message::create([
            'from' => Auth::user()->email,
            'to' => $request->to,
            'subject' => $request->subject,
            'content' => $request->content,
            'draft' => 0,
            'file' => $fileName,
            'owner' => 1,
        ]);
        $message = Message::latest()->first();

        $data = [
            'subject' => $message->subject,
            'content' => $message->content,
        ];
        $senttoemail = $message->to;
        $subject = $message->subject;
        $from_email = Auth::user()->email;
        if($request->file){
            $pathToFile = public_path('uploads/' . $message->file);
            Mail::send('mail3', $data, function($msg) use($senttoemail, $subject, $pathToFile, $from_email){
                $msg->to($senttoemail);
                $msg->subject($subject);
                $msg->from($from_email);
                $msg->attach($pathToFile);
            });
        }
        else{
            Mail::send('mail3', $data, function($msg) use($senttoemail, $subject, $from_email){
                $msg->to($senttoemail);
                $msg->subject($subject);
                $msg->from($from_email);
            });
        }
        return redirect()->route('client.email')->with('The message was successfully sent.');
    }

    public function save(Request $request){
        $request->validate([
            'content' => 'required'
        ]);
        Message::create([
            'from' => Auth::user()->email,
            'subject' => $request->subject,
            'content' => $request->content,
            'draft' => 1,
            'to' => $request->to,
        ]);
        return redirect()->action('client\MessageController@draft')->with('message', 'The draft was successfully saved');
    }

    public function singletrash($id){
        Message::find($id)->update([
            'trashed' => 1,
        ]);
        return redirect()->action('client\MessageController@trash');

    }

    public function singledelete($id){
        Message::find($id)->delete();
        return redirect()->action('client\MessageController@trash');

    }

    public function movetotrash(Request $request){
        foreach($request->ids as $id){
            Message::find($id)->update([
                'trashed' => 1,
            ]);
        }
        return 1;
    }

    public function recover(Request $request){
        foreach($request->ids as $id){
            Message::find($id)->update([
                'trashed' => 0,
            ]);
        }
        return 1;
    }

    public function singlerecover($id){
        Message::find($id)->update([
            'trashed' => 0,
        ]);
        return redirect()->action('client\MessageController@trash');

    }

    public function delete(Request $request){
        foreach($request->ids as $id){
            Message::find($id)->delete();
        }
        return 1;
    }
}
