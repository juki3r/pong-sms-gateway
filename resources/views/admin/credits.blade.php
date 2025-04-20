@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Credit Top-Up</h1>

    <table class="w-full bg-white shadow mb-8 rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">User</th>
                <th class="p-2">Current Credits</th>
                <th class="p-2">Add Credits</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="border-t">
                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->sms_credits }}</td>
                    <td class="p-2">
                        <form action="{{ route('admin.addCredits') }}" method="POST" class="flex space-x-2">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="number" name="credits" class="border p-1 w-20" required>
                            <button class="bg-green-600 text-white px-2 py-1 rounded">Add</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
