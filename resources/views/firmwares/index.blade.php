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
                <form id="addFirmwareForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addFirmwareModalLabel">Add Firmware</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Version</label>
                            <input type="text" name="firmware_version" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>OTA Key</label>
                            <input type="text" name="ota_key" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Firmware File (.bin or .hex)</label>
                            <input type="file" name="file_path" class="form-control" accept=".bin,.hex" required>
                        </div>
                        <div id="formErrors" class="text-danger"></div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
                </form>
            </div>
            </div>

    <script>
        document.getElementById('addFirmwareForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let form = e.target;
            let formData = new FormData(form);
            let errorsDiv = document.getElementById('formErrors');
            errorsDiv.innerHTML = '';

            fetch("{{ route('firmwares.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Close modal
                    let modalEl = document.getElementById('addFirmwareModal');
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();

                    // Reset form
                    form.reset();

                    // Optionally: refresh firmware table or append new row
                    location.reload(); // simplest
                } else if (data.status === 'error') {
                    let messages = [];
                    for (let key in data.errors) {
                        messages.push(data.errors[key].join(', '));
                    }
                    errorsDiv.innerHTML = messages.join('<br>');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>


</x-app-layout>
@endif
