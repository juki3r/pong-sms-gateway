<?php

namespace App\Http\Controllers;

use App\Models\Espdevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FirmwareController extends Controller
{
    // Get current firmware version
    public function version(Request $request, $device_name)
    {
        $device = Espdevice::where('name', $device_name)->first();
        if (!$device) {
            return response()->json(['error' => 'Device not found'], 404);
        }

        // Check OTA key from header or query param
        $key = $request->header('X-API-KEY') ?? $request->query('api_key');

        if ($key !== $device->ota_key) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response($device->firmware_version, 200)
            ->header('Content-Type', 'text/plain');
    }


    // Download firmware
    public function download(Request $request, $device_name)
    {
        $device = Espdevice::where('name', $device_name)->first();
        if (!$device) {
            return response()->json(['error' => 'Device not found'], 404);
        }

        // Check OTA key
        if ($request->header('X-API-KEY') !== $device->ota_key) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Firmware file path
        $path = public_path("uploads/firmwares/{$device_name}.bin");
        if (!file_exists($path)) {
            return response()->json(['error' => 'Firmware not found'], 404);
        }

        return response()->download($path, "{$device_name}.bin");
    }
}
