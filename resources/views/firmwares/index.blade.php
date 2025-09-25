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
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>

                    @elseif(session('alert'))
                        <div class="alert alert-danger">
                            {{ session('alert') }}
                        </div>
                    @endif


                    
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-4">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Firmwares') }}</h2>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFirmwareModal">
                                Add Firmware
                            </button>
                        </div>


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
                                            <a href="" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="" method="POST" style="display:inline-block;">
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

    <!-- Add Firmware Modal -->
    <div class="modal fade" id="addFirmwareModal" tabindex="-1" aria-labelledby="addFirmwareModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('firmwares.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFirmwareModalLabel">Add Firmware</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger mb-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Firmware Version</label>
                            <input type="text" name="firmware_version" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">OTA Key</label>
                            <input type="text" name="ota_key" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Firmware File</label>
                            <input type="file" name="file_path" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Firmware</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
@endif
