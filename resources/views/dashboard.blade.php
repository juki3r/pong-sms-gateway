<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-flex justify-content-between">
            {{ __('Dashboard') }}

            <span class="d-flex justify-content-center align-items-center" style="font-size: 12px !important">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database text-warning" viewBox="0 0 16 16">
                <path d="M4.318 2.687C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4c0-.374.356-.875 1.318-1.313M13 5.698V7c0 .374-.356.875-1.318 1.313C10.766 8.729 9.464 9 8 9s-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777A5 5 0 0 0 13 5.698M14 4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13zm-1 4.698V10c0 .374-.356.875-1.318 1.313C10.766 11.729 9.464 12 8 12s-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777A5 5 0 0 0 13 8.698m0 3V13c0 .374-.356.875-1.318 1.313C10.766 14.729 9.464 15 8 15s-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13s3.022-.289 4.096-.777c.324-.147.633-.323.904-.525"/>
                </svg>

                Credits: 
                {{ $current_credits }}

            </span>
        </h2>
        
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
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

                    {{-- Recipient error --}}
                    @if($errors->has('recipient'))
                        <div class="alert alert-danger">{{ $errors->first('recipient') }}</div>
                    @endif

                    {{-- Message error --}}
                    @if($errors->has('message'))
                        <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                    @endif

                    {{-- Or all errors at once --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                    {{-- TOP --}}
                   <div class="row mb-5">
                        <div class="col-12 col-md-6 p-2">
                            <div class="border d-flex justify-content-center align-items-center gap-3 rounded p-3">
                                <div class="col-4">
                                    <button class="d-flex shadow justify-content-center align-items-center gap-1 bg-warning border rounded p-3 w-100 h-100"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#sendSmsModal"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                                        </svg>
                                        <span>Send</span>
                                    </button>
                                </div>
                                <div class="col">
                                    <p>Send text message using our online tools.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 p-2">
                            <div class="border d-flex justify-content-center align-items-center gap-3 rounded p-3">
                                <div class="col-4">
                                    <button class="d-flex shadow justify-content-center align-items-center gap-1 bg-warning border rounded p-3 w-100 h-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-database" viewBox="0 0 16 16">
                                        <path d="M4.318 2.687C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4c0-.374.356-.875 1.318-1.313M13 5.698V7c0 .374-.356.875-1.318 1.313C10.766 8.729 9.464 9 8 9s-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777A5 5 0 0 0 13 5.698M14 4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13zm-1 4.698V10c0 .374-.356.875-1.318 1.313C10.766 11.729 9.464 12 8 12s-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777A5 5 0 0 0 13 8.698m0 3V13c0 .374-.356.875-1.318 1.313C10.766 14.729 9.464 15 8 15s-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13s3.022-.289 4.096-.777c.324-.147.633-.323.904-.525"/>
                                        </svg>
                                        <span>Buy</span>
                                    </button>
                                </div>
                                <div class="col">
                                    <p>Buy credit to continue privileges.</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- SMS HISTORY --}}
                  <div class="row mt-5">
                        <div class="responsive-table col-12">
                            <h3 class="py-3 fs-6 d-flex justify-content-between">
                                <span style="font-size: 16px; font-weight: 500">
                                    Messages history:
                                </span>
                                <form action="{{ route('deleteSms') }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger p-1" style="font-size: 12px">
                                        Delete All
                                    </button>
                                </form>

                            </h3>
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover" style="font-size: clamp(0.75rem, 1vw, 1rem);">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>To</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $index => $msg)
                                    <tr id="msg-{{ $msg->id }}">
                                        <td>{{ $messages->firstItem() + $index }}</td>
                                        <td>{{ $msg->phone_number }}</td>
                                        <td style="white-space: normal; word-wrap: break-word; max-width: 200px;">
                                            {{ $msg->message }}
                                        </td>
                                        <td class="status">{{ $msg->status }}</td>
                                        <td>{{ $msg->updated_at->format('Y-m-d') }}</td>
                                        <td>{{ $msg->updated_at->format('H:i') }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>

                            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                            <script>
                                function updateStatuses() {
                                    axios.get('{{ route("messages.status") }}')
                                        .then(response => {
                                            response.data.forEach(msg => {
                                                const row = document.getElementById('msg-' + msg.id);
                                                if (row) {
                                                    row.querySelector('.status').textContent = msg.status;
                                                }
                                            });
                                        })
                                        .catch(error => console.error(error));
                                }

                                // Poll every 1 second
                                setInterval(updateStatuses, 1000);
                            </script>


                            <div class="d-flex justify-content-center my-3">
                                <div class="w-auto">
                                    {{ $messages->links('pagination::bootstrap-5') }}
                                </div>
                            </div>


                            </div>
                        </div>
                    </div>

                    {{-- SEND SMS MODAL --}}
                    <div class="modal fade" id="sendSmsModal" tabindex="-1" aria-labelledby="sendSmsModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form action="{{ route('sendSms') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                <h5 class="modal-title" id="sendSmsModalLabel">Send SMS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient" class="form-label">Recipient</label>
                                    <input type="number" class="form-control" id="recipient" name="recipient" placeholder="09xxxxxxxxx" required>
                                    @error('recipient')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" maxlength="162" required></textarea>
                                    @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-warning">Send</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
