<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Device;
use App\Models\Message;
use App\Models\Espdevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentSimAcknowledgmentMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{


    public function dashboard()
    {
        $messages = Auth::user()->messages()->latest()->paginate(5);
        $current_credits = Auth::user()->sms_credits;
        $isrent = Auth::user()->isrent;
        $data = Message::paginate(5); // or any model
        return view('dashboard', compact(['messages', 'current_credits', 'data', 'isrent']));
    }

    public function status()
    {
        // Only current user's messages
        $messages = Auth::user()->messages()->select('id', 'status')->latest()->get();

        return response()->json($messages);
    }


    public function sendSms(Request $request)
    {
        $request->validate([
            'recipient' => [
                'required',
                'digits:11',          // eksaktong 11 digits
                'regex:/^09\d{9}$/',  // dapat magsimula sa 09
            ],
            'message' => 'required|max:162',
        ]);

        $user = Auth::user();

        if ($user->sms_credits <= 0) {
            return redirect('dashboard')->with('alert', 'Not enough credits, Rent sim card now to continue!');
        }

        $user->messages()->create([
            'phone_number' => $request->recipient,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        $user->decrement('sms_credits');

        return redirect('dashboard')->with('status', 'New sms added please wait for update!');
    }

    public function messagestatus()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(5); // 10 per page

        return response()->json([
            'messages' => $messages->items(),
            'current_page' => $messages->currentPage(),
            'last_page' => $messages->lastPage(),
        ]);
    }

    public function deleteAll($user_id)
    {
        // Find the user
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Delete all messages that belong to this user
        Message::where('user_id', $user->id)->delete();

        return redirect('dashboard')->with('status', 'All messages are deleted!');
    }


    //Rent Simcard
    public function rentsimcard()
    {
        return view('rentSim.index');
    }
    public function uploadData()
    {
        return view('rentSim.fillup');
    }
    public function storeRentSimcard(Request $request)
    {
        $request->validate([
            'barangay' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'zip' => 'nullable',

            'valid_id' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'selfie_id' => 'required|file|mimes:jpg,jpeg,png|max:2048',

            'full_name' => 'required|string|max:255',
            'dob' => 'required|date',

            'agreement' => 'accepted',
        ]);

        $user = Auth::user();

        // Save uploads
        $validIdPath = $request->file('valid_id')->store('uploads/ids', 'public');
        $selfiePath = $request->file('selfie_id')->store('uploads/selfies', 'public');

        // Update user record
        $user->update([
            'barangay'   => $request->barangay,
            'city'       => $request->city,
            'province'   => $request->province,
            'zip'        => $request->zip,

            'valid_id'   => $validIdPath,
            'selfie_id'  => $selfiePath,

            'full_name'  => $request->full_name,
            'dob'        => $request->dob,
            'isrent'    => true,
        ]);

        // Send acknowledgment email
        Mail::to($user->email)->send(new RentSimAcknowledgmentMail($user));

        return redirect()->route('dashboard')->with(
            'status',
            'Your SIM rental application has been submitted. Please wait for verification and check your email regularly.'
        );
    }


    //Firmwares
    public function showFirmwares()
    {
        $firmwares = Espdevice::all(); // same as get()

        return view('firmwares.index', compact('firmwares'));
    }

    // Add Firmware


    public function storeFirmware(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'firmware_version' => 'required|string|max:50',
            'ota_key' => 'required|string|max:100',
            'file_path' => 'required|file', // required
        ]);



        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $file = $request->file('file_path');
        $filename = $file->getClientOriginalName(); // keep original name
        $filePath = $file->storeAs('uploads/firmwares', $filename, 'public'); // saved in storage/app/public/uploads/firmwares

        Espdevice::create([
            'name' => $request->name,
            'firmware_version' => $request->firmware_version,
            'ota_key' => $request->ota_key,
            'file_path' => 'haha', // store path in DB
        ]);

        return $filePath;

        // return response()->json(['status' => 'success', 'message' => 'Firmware added successfully']);
    }
















    public function adminLogs()
    {
        $logs = \App\Models\Message::with('user')->latest()->get();
        $devices = \App\Models\Device::latest()->get();
        return view('admin.logs', compact('logs', 'devices'));
    }

    public function creditPanel()
    {
        $users = User::all();
        return view('admin.credits', compact('users'));
    }

    public function addCredits(Request $request)
    {
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
