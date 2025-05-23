<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Device;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function dashboard() {
        $messages = Auth::user()->messages()->latest()->get();
        $current_credits = Auth::user()->sms_credits;
        $data = Message::paginate(5); // or any model
        return view('dashboard', compact(['messages', 'current_credits','data' ]));
    }

    public function sendSms(Request $request) {
        $request->validate([
            'recipient' => 'required|max:11|',
            'message' => 'required|max:160',
        ]);

        $user = Auth::user();

        if ($user->sms_credits <= 0) {
            return back()->with('status', 'Not enough credits!');
        }

        $user->messages()->create([
            'phone_number' => $request->recipient,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        $user->decrement('sms_credits');

        return redirect('dashboard')->with('status', 'New sms added please wait for update!');
    }

    public function messagestatus() {
        $messages = Message::orderBy('created_at', 'desc')->paginate(5); // 10 per page

        return response()->json([
            'messages' => $messages->items(),
            'current_page' => $messages->currentPage(),
            'last_page' => $messages->lastPage(),
        ]);
    }
    
    

    public function adminLogs() {
        $logs = \App\Models\Message::with('user')->latest()->get();
        $devices = \App\Models\Device::latest()->get();
        return view('admin.logs', compact('logs', 'devices'));
    }

    public function creditPanel() {
        $users = User::all();
        return view('admin.credits', compact('users'));
    }
    
    public function addCredits(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'credits' => 'required|integer|min:1'
        ]);
    
        $user = User::find($request->user_id);
        $user->increment('sms_credits', $request->credits);
    
        return back()->with('status', "Added {$request->credits} credits to {$user->name}!");
    }





    //VIEW SEND SMS PAGE
    public function send_sms()
    {
        $current_credits = Auth::user()->sms_credits;
        return view('sms.send_sms', compact('current_credits'));
    }

    //VIEW Crdits PAGE
    public function credits()
    {
        $current_credits = Auth::user()->sms_credits;
        return view('credits.index', compact('current_credits'));
    }

    public function package(Request $request)
    {
        $request->validate([
            'selected_package' => 'required',
        ]);
        $current_credits = Auth::user()->sms_credits;
        $selected_package = $request->selected_package;

        $total_credits = $current_credits + $selected_package;

        $creditUpdate = User::where('id', Auth::id())->update(['sms_credits' => $total_credits]);

        return redirect('dashboard');
        
    }

}
