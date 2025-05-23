<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Device;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SmsGatewayController extends Controller
{
    // ESP32 fetches the oldest pending message
    public function fetchSms()
    {
        $message = Message::where('status', 'pending')->orderBy('created_at')->first();

        if (!$message) {
            return response()->json(['status' => 'no_pending'], 200);
        }

        return response()->json([
            'id' => $message->id,
            'phone_number' => $message->phone_number,
            'message' => $message->message
        ]);
    }



    // ESP32 posts back status
    public function updateSmsStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:messages,id',
            'status' => 'required|in:sent,failed',
            'response' => 'nullable|string',
        ]);

        $msg = Message::find($request->id);
        $msg->status = $request->status;
        $msg->response = $request->response ?? '';
        $msg->save();

        return response()->json(['message' => 'Status updated']);
    }

    // ESP32 pings this every 30s to stay online
    public function ping(Request $request)
    {
        $deviceName = $request->input('device', 'esp32-gateway');

        $device = Device::firstOrCreate(
            ['name' => $deviceName],
            ['status' => 'online']
        );

        $device->status = 'online';
        $device->last_ping = Carbon::now();
        $device->save();

        return response()->json(['status' => 'pong']);
    }

    // Authenticated users can send SMS
    public function sendSms(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'message' => 'required|string',
        ]);

        $user = $request->user();

        if ($user->sms_credits <= 0) {
            return response()->json(['error' => 'No SMS credits'], 403);
        }

        $message = Message::create([
            'user_id' => $user->id,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        // Decrease SMS credit
        $user->decrement('sms_credits');

        return response()->json(['message' => 'SMS queued', 'id' => $message->id]);
    }

    //FOR API USERS
    public function sendSmsAPI(Request $request)
    {
        $apiKey = $request->header('X-API-KEY');

        if (!$apiKey) {
            return response()->json(['error' => 'API key is required'], 401);
        }

        $user = \App\Models\User::where('api_key', $apiKey)->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }

        $request->validate([
            'phone_number' => 'required|string',
            'message' => 'required|string|max:160',
        ]);

        if ($user->sms_credits <= 0) {
            return response()->json(['error' => 'No SMS credits'], 403);
        }

        $message = \App\Models\Message::create([
            'user_id' => $user->id,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        $user->decrement('sms_credits');

        return response()->json([
            'message' => 'SMS queued',
            'id' => $message->id
        ]);
    }

}
