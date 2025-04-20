@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">All SMS Logs</h1>

    <table class="w-full bg-white shadow rounded mb-8">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">User</th>
                <th class="p-2">To</th>
                <th class="p-2">Message</th>
                <th class="p-2">Status</th>
                <th class="p-2">Response</th>
                <th class="p-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr class="border-t">
                    <td class="p-2">{{ $log->user->name }}</td>
                    <td class="p-2">{{ $log->phone_number }}</td>
                    <td class="p-2">{{ $log->message }}</td>
                    <td class="p-2">{{ $log->status }}</td>
                    <td class="p-2">{{ $log->response }}</td>
                    <td class="p-2">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-lg font-bold mb-2">Gateway Status</h2>
    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Device</th>
                <th class="p-2">Status</th>
                <th class="p-2">Last Ping</th>
            </tr>
        </thead>
        <tbody>
            @foreach($devices as $device)
                <tr class="border-t">
                    <td class="p-2">{{ $device->name }}</td>
                    <td class="p-2">{{ ucfirst($device->status) }}</td>
                    <td class="p-2">{{ $device->last_ping ? $device->last_ping->diffForHumans() : 'Never' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
