@if(Auth::user()->role == 'admin')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-flex justify-content-between">
            {{ __('Firmwares') }}
        </h2>    
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Version</th>
                                    <th>Key</th>
                                    <th>File Path</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($firmwares as $firmware)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $firmware->name }}</td>
                                        <td>{{ $firmware->firmware_version }}</td>
                                        <td>{{ $firmware->ota_key }}</td>
                                        <td>{{ $firmware->file_path }}</td>
                                        <td>
                                            <a href="{{ route('firmwares.edit', $firmware->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('firmwares.destroy', $firmware->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No firmwares found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endif
